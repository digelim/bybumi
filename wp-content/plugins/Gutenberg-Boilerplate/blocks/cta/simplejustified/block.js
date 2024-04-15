const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

registerBlockType("gb/simplejustified", {
  title: __("Simple Justified", "GB"),
  icon: (
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAACgAAAAKgCAMAAABgedRjAAACTFBMVEX////v7/DExsm+wMTo6erd3uBPVF8RGCc+RFDLzdDAwsYXHiwSGSikp6zz9PT5+frZ2t2oqrCvsrfGx8vCxMjw8PHX2dvb3N7q6+wnLTsaIC/m5+mfoqhhZW9GS1cwNkMgJzU1O0dITlljZ3GWmaAcIjF3e4TJy87+/v5WW2bV19mSlZyanaOMj5Zrb3n09fWQlJtCSFNBR1OJjJTu7u8tNEF9gYlaX2k7QE0sMj+dn6b8/PyPkpn9/f1NU17k5efQ0dTe3+F+gopcYWvx8fI4PUrU1dgTGikmLDrc3d9qb3hSV2JESVX4+PkeJDKFiZBzd4Cmqa56fod1eoNRVmEVHCsqMD1YXWjP0NOIjJP29vdpbnfs7O6pq7FVWmSNkJdxdX6sr7S2uL27vcKrrbKbnqRKUFutsLVtcXqBhIy9v8P7+/tvc3xUWWShpKplanR4fIXi4+TNz9IiKTd/goteY22KjZX6+vqeoaeHi5Jma3TS09b29vaytLnx8vO5u7/39/inqa8kKziUl56ipavj5ObKzM+Ym6K0trsyOEVzeIDV1tmCho+5vMDg4eNfZG7y8f6+uvWEfu1qYulWTeZPRuXt7P2clvFTSuXLyPhZUebHxPekn/KppfK6tvXQzvlQR+XOy/fq6fy0sPR6c+u4ur5mX+iIgu6fmvGBeux+d+xtZun+/v/k4/rb2fq/vPZeVediWuh3cOuUju/6+v/f3frn5vzBvvauqfOPiu+WkfDFwvdxaurh4Pv19f74+P78/P/V0/n9/f/DwfHc4tx7AAA3e0lEQVR4AezbY3YuTRTH0XN5rm3btm0rec07/zHEqZid1VlPZe8J/L/+uqsqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAmAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIBly1esrHsQAIBRVq3OPmvW1jsIAMBo69bngA0bO29w0+YAACqzZesktm1ftSkW346txc7oGLu2FrtjwJ69OWTfrmjDwgzuP3Dw0OF9mUeOHjt+YH9UAwA4kVM4efTU6TOxqM5mcS46xvksLsSAi1lcijYswODlK1dzjGvXb0S9AEAAFjdvbYnGBODtLO5EG5oPbrubExy5dz/qBQACsFj/4GE0JAAfZXEz2tB08PHqnNSdJwEAVByAxaGnVQTgs+fFi7YD8FYWz6MNDQdvvMwpHHkVAEDFAVjs215DAF7LYk/bAbj2dQ7bFm1oNrjpak7pzdsAACoOwOLN42hCAI48yngX7Wg0+D6ncXNTAAAVB2Dx4WM0IQDP3PuUfdZ/3hztaDK4Lqd1PgCAmgOw+BINCMA+K79++35gVbSmweCPHG3v7Q9dOVr3xwAA6gnA7l8G/Vhzd0OO8Xp/NCIAO8evOcpvTyPi9+V3cpQDAQDUE4B/RPHnX3/naP8IwKUSgP9msf6/GPTiUY64HZUBAAFY/L83Rxw+s0QCUAAey+JnDPu4Jos7USsAEIC97N33WxNZ+8fxj/UDJsDaQCIlVkKwC8IGIjaMLhieFbFiWUUFwUXWLsXeZTvbvv0p/+f3gjBnzpxMwozPlS3J/frVmzLxl/d1wsmNfSHaFhVIAEoA2t2/F7Z+KpsghBBCiLwNQFylbTcM8cOXtxyovlb/2YFYObJYcv3iwN7Oc4M3huaycpFSmn3WDED9S/fBUL5IWQin0kUzaOtPze2HoX3Z51uHby79rLvqylF413d5Y0/93g3Hz5dmCsD2Rcp+53MUe3+O/Te+7D6398TIrR11Q8jG/IGzomkv3dr+i8OdnQO7P18D3XYqMdhGqQe0EEIIIfI2AEtDVAaM6NlRS9vJc1/B3Y2btNy+s92MOp+zZ6ichGEnlbtwitLdPejur1hKTdGDUnhSPhzgnED1qHsAfun8oQ+pJO9nfo6DsB07X0Nb8tSKCDIzfuCsEVpOpDr8Ua/9a6+CbYzKKtjGaWuHEEIIIfI2AHGXSic0+x4FaLhZh3SrOqhrWmhEnc/ZCtoOG0EapDLhPwCxePAIDZuGyzGv0U7qQle9BGAFbcvgsIa2FbCsvXObho4v4v9GAI4fpMOpSVgiQwo0h6kE4hBCCCFE/gbgHiodsF1N0MWtIRhKeukUeGxEnc/ZIiptcOinknziPwBXVtJF6Dzm8VUlDd0eAlB/jj1weOr2HCuf0cXevo8OwL4uGtZVILvz2iyEEEIIkccB+JxKEpayAbq71gddZJBpAuVG1PmbbaCyFw4jVD6D7wC82ksla9QaJkJM88JDADaYYa1Uu/xvxHrp6tPTHxmAfeuYJjyKbIZaqHQibwkhhBASgO5/dLe4i5nUNkKzhy5q4nrU+Z19SaW3FJr4MyqL/Abg/XPM6FojMrscZLrw2vkDsJ22UWiGwmmfwTI0zEwCrz4uAC+5PmkcWbTRdhF5TAghhJAAHKBSY6XWNWZ2ohXKqyDdvNajzvfsNSpvoPmKSmWr3wAcZBb1yGh1Jd0czB6A5nPEoFlJ5dkQZnUzs5OLPyYAowm/O34j3bQlVyOPCSGEEBKAHVSqkdLAbA7AUtZBV5sqqUR9z8aoXIJmN5Ue+AzAlUFmE0MmA3T3dv4AfJChMAepvJtr4wSzWH/ffwC2rKerUCkyGL9LzSDymBBCCCEBWJeedu8DeqA9uvf5lgNF1IxhzkM6JcJME/U925egpQmaLiqvYPrkyAxqjsx6jhmTTdQka7a9W1pJTagC7lbRcJua7AHY2EtL6AlsLVTqMGP7W9oS9R+qqrpvBml77TsAM+uHu5dF1Nxeg/wlhBBCSACO76KtCjPKWqgEGiYxq7g2/TP4FgSoORk7OoTVdSNBM+p8z9ZT+QRKoz1c63cTyDnaAgcOAUBrTG+5XUNwtZOa0J2xcZyNftjkLQD157gCpZ1KU8RczMvhUcwarady8tjHBeCzW19OVfXs9PJud90RakLFyF9CCCGEBODqetoCjZhxnUrTPlhe1qaF2lNqhs8iZUy1xMfOnqeyEcoXVD74DMBR17hZ3ETbY7gZpWbnWqT0rfcWgP1UeqBUUbmDGWuDtAT6YSmrpxL7mABMNNzHrJIkbb2r4eJFgJrEFIQQQgiRtwG4OPaMmnPmwVVgDLbRJlq2YVYzbSNxWKJhaqK+Z/XlJJ1Qzulz/gKwjUrwMpTyMJUN871u7GiEZXKXpwDUnqMWSrP5XnoDlQewHbugf7XvAEzcgOVoiLbTSDPUQ11yAkIIIYTIrwBkW8qZnpEiOr3CjL5e7fxN9974uJjSAJWmMtieUhP1PQtU0xI4izmRI7S0wGcAtlB5BE3DfLcj1lMJlsO2P+ElAFFNpQJzyjaZHw9YREszdMdO0nLUfwB+gG03bZeR5jh1XV9DCCGEEPkWgBnthHEJN7k9Uw59YrxVzCpo4h1G1PmbBd5QmcKcfVTafAbgGG3l0JSGqSxHusVBKiPQDXsKwMtUnmPOIipbMaOcyko4dNMS8x2Aoe2wna2kUgXTKuoGhyCEECKHInkL4i8ZgOH9ZuYNwKmBlqvG3YXb96GrMqLO3yxwLEnLZszZSmXUZwDeoXIi4xq8mzAY2ToGXYWnACwL07LU5bhtP2Z8oOUtnE7T8o3vAByB7iCV3TCtp+32FIQQQuRQ5Nvvvv/hx+m88+MP33/3bQTirxeAvauQEjLfAVZWOP9irpmZAuVrI+p8zKZsM6NIz5Qa+AzAzowLLqaoVGZ/2Z5F4NDkJQAxQEugFCnrzBPXm7Q0w6mPlkrfAbgFugNUDsAQpa1rFEIIIXIn8tPPv0znrV9+/ikC8VcLwAdIWUDl2bBTvXNJbw2VGDLmURS+ZlMWmcdkWJCg5aq/ADQ/eE93KEhLcAhpPlCphtNnngJwWdpSk/00+7qFyrCTnY/BuN8AnMh0zHogy0PW3IcQQoiciUR+/W06r/32H5EIxF8pACtVMETpQQsA1GbsKjTrUedrNqX1iNmLK2hJ9PkNwDCVcTjVUmlHmoHMu3GfewrAeKUdd5i1hZbgWsy6TQ8a/QbgQuiuZwnATloCUQghhMiZSPw/p/Pef8UjEH+dANy2AJYb9KASAJJUKuC0TY86P7OWHlpOmVM34TMAn1AJwNBFpRhpTmW+O/HUUwDilnFzGhdo2YtZx+hFhd8AXOk5AJ/R0g0hhBA5E4l8N10A/lvOAP9CAbgMthJ6EABwNssB1R496vzMWupoCZUBQKSSlqd+A3A/lZMwXKDyJusekAk4PfYWgMVUDgPA2QAtLzDra3pRl7MAbKQl8QRCCCFyJvI//ztdAH75vwjEXyUA98G2g16UAYtpM9PhoRF1nmctkSZnnY7REir1G4DFVNbBUE3lS6RZR+UKnFZ5C0DU0tLmvHUSWK1+Ow9u5CwAl9DyFkIIIXImEv9+uiB8H4/gz0gC8HnKBdr26lnhNQDLaFsMp1tG1HmeVQZp2ePc5VENxf8JYCUMnVQmkKaGyhdweuMxALtpWQ8A79Ku/C75gwNwHy2nIITIHSH999N0gfi7FOCfexXcCdquQJnyGoAIG+WmeWT+k9dZ5bDzwsk1907z/zeAmb+gGGkOUrkKpxceA7CclsRqx5Xn60gZ/4MDcKFe2kIIkTMSgP+YLhD/kAD8cwfgadpa4m5rM54fzch4g3QZnE7oUedrVunQr+ceSnBO+Bh0fm8BT8KpKest4EtUuuF00WMAokVPvnJaNo1jTpKWU0czGs9VAGrBH4MQQohcibT+c7pA/LM1gj8xCUBU01YCyxoqD5DVeipb4RDXD/x8z5qF9SUwQcsA/AdgS8b67GPWzwHsprIUTqe8BmCb/so30DLiUrobkFnOArBvyvISQgghciQSb/1tukD81vrnPgKUADyaoHLyLOZEEl4/FuSbjHl0mraov1llPy13gQFaFkHjfxPIQzhMZN8EcpX6ZWRda9JrAI7SciSCvbRMwbKUlmt/QAD+PoQQQgJw6JfpAvHLkATgnzsAcYm2Nlg6vAbJcSqhBdA9pC3qc1bp4pzkEE6qTGuFxv8u4Bo4/C37LuDLtF2BbhW9BiDW0/JVaa/LQuR32gVnCcC8JYSQAJwuGBKAf/YAXBuikmzEnHtUXiKbZbR9gGYyTFvU92za77zyPS23AP8BeJi2V9D0haicR7rtASrroVvqPQBjtJyZoOUSlJVU+iUA85MQQkRa708XjPutEfyZSQDiA20qrfZT2QyHD293dlZfGtxRteI0AAyFqSTXwNZNTRT+ZpW1QVWMO2gp9hyAp2FroVIP8/mznb410zZltK/XAOxLcE7RBloWwu0jD3cNQfev2qK9dwf2XIz1X8lpALZPnIkVt6IgCCGEBKAEoATgoTCVwNcu69EWQVMcNA7xztG2qxSWFQkz6nzOmqdsb1u8flZxjfvutjbaYlAWBqiMwE0JbeFyWCqe+QhA3GSaTyOwDVLphubQSVpqchiA9x8mSHJnOQqBEEJIAEoASgCigbYNmLOFyu1FUNo7jLVmeEPNtbmAjJcEqIvC56zygmm64fleStchKC9pS6zAnPdh9/M94/ROObkQKXWf0k8APmWaPdBEqSQaoIxXU3mduwCM72VKYCUKgRBCSABKAEoAPtFT5jRSGp9RCQ62Y1bZxRCVDsw6e5uaQM/lir5XL1roFPU7qywI0FSO7G7R1tEw9a/YG8waoKa5YvYpj/fS1tUKV/XU1V8fazy8opn0FYCTAZr2QbeUtoPWP000UQmuzV0A7qClaRIFQAghJAAlACUAUeK2EO4xNYnO4xuvbu48Qk2JcbaVTdT3rNJMQwvm0UBDJ2aV1lJ3u+ZEE3WhJXB3NMB0PgMQ39CwDg7tYWqK3rVVDTa/peYcchaA9wNULqIQCCGEBKAEoARga4fb26DvmNUF8+zKFGqiEvU/a2aLsgPzqKAhjJS6BLOpQib36G6djwCcoOEMnFYwq8oFuQvAMdqaUQiEEEICUAJQAhBv3BbCne1gFsl2WJYE6Ob5LSpR37PKeIhOo5hPJw1HkdJNk7fyKetw/4o3PgLwSZJOFTBsYzb/Qu4CcIUetSgIQgghASgBKAGILreFcOW1zCi5CrYYXayP61Hnf1YZMWYxryka+pEyNMyMli5AZsVJpgsv9hOA+IwOu2Aq7WRmz5HDANxH2ykUBiGEkACUAJQAXEi3hXCrm5nBySh0/QGaQkugR53/WeUxHWKY3yCdNsNSFaC7A63I5vBJpumHrwBcRIcGpIl3M4PAdeQyAI/1UtmNwiCEEBKAEoASgKin7SIskbYE3XS2w2lZkk7JhTCjzuescj9MTW8fPDhHhy4oxSfpIrQC83jZQcNz+AvA1iPUBNvhYipMN+tW5ngTyAdajvShQAghhASgBKAE4BhtyT4orzYEaOpahTTl3ySoKXoPM+p8zyrD1FyAF5GSZ9QE7kPpO3OShnDPEsxr9fEkNZUT8BmA6KHmWobOvHWbpk9LWpHjALxfZHXpYxQKIYSQAJQAlADUs4G3oGl8XUTNus2L4Gp/T0glXVUcZtT5n1VWUXMe3kye2RlURVvfB03r5fqg3rMlZ+HJoR0nVZMNTsJ3ANZ5unJctuJCkLZnj/qPIfe7gEsvccbb1FcIIYSQAJQAFPsXlWy9VH/h0fG2z0eR2fjhiYa/9Wwt+RrZ+Z2NnzS29XrU+Kaq4WF31VR0CKY1dV/s6Gmuv7R1+apReDdUceXq8Uvdsa8iyKU1K/t3bL57YkPPvdi+CH4nY7FL3f/P3l14t3GsfRz/BacQZqZCHGbHYWYqMzec9IThbajc4HkNGktmxXYlmSUzyrH/sjvPzq52tYninGtFp/F9PoVMtLOzOvw9C9q7N5E8jDHGOAAZ64ddImYmBjbGGGMcgIFgqCxUEfDLf61AZWVlVbIDcOuQIUO2gTHLRWG7i4GMMcYYB2DF42oYaoLy36oQQFayA3BB3Ov+GVsrYuaMBmOMMTZwA9CXBVttlUwoUFdXVyb7ElKzyuWLylKzwxyA/XITScLuCtt9MMYYYwM3APNr4VQakYnUA8iVfSkB0CBfVCOAAAdgf0xccR6sny6OvDEag779WNgmgzHGGBu4AVgHpbE4WJ9dWAqlycMB+Gr1nxBcgP11ToiP5winb8AYY4wN3AAMQmmKSOIrhlLIAfgqmXRJ9LcA2YY5wmXE62CMMcYGbgDWAGjOl6Y8ADXSUllYXOyt8JilGCqAEgqFcqSTvypY1NLqrZIkHApBqQmF2sytwda6QrVERO3XLpUKY4FwYUtHp+zUs4tDoUqpVYXK6gqDEWnLby/L8tanNACnrE8/d3nsQtjO3Lp87vM7N7Fl0aJFM6A8UoMxmLJk5pWtwHX1l2v4YuS7Xy7enYY4D9SmwcCQ7efO39oEIO305XPpv95EzFczLp/7buN45/whODRj/9qjIGlDlpw9+fuPo/Acu/tdgGywcPsAjDHG2MANwE4oFdJSBaVTj7NrYMgNmm1oCUqHqi5oeTnmclqXTshS/ZdAPYBS64pzWyBqLBOCpUyvVQJDY6FPmkJRkA5PygJw5/43heHcFJhOrxEkY9h4IcQa6w0IR4fR+7puAfTbwcsm/ybI7C1PvTshPe2KIPOu4c/X9KTB1rGWmsfK+NGef/YQzfoQyt25wjB1HBfgS5UuXOZ+AcYYY2zgBmCr45QfyVHyJSmshqUjcQA2dMOSG3gqANueWNuy4wKwFs8KwIqovXdYGspgepyqANw2V1jmmJ12dI/Qpv7gDMCxB4UdgFus3eZ+9VQAbhTa5WVrhHZ4KMgw+1gjFtkBmC7MAFwiYv4/DYk94ALsp7ki3uwLYIwxxgZwAPYAaE14b2B3XnEzFLp4W1TSDaWkpKTe0Yu9FHZZoTza1iNloKQEelax2hox9uitzQSanQFYA+AJgjKoZzeXlNABAlGa3FNcS2u22F8C3T3dalJqAlC/qX7u2eHTKAO+gHKBhmLEit/UB84ApGjYYwXgCpWHUwVZ6w7A1/aIqbr8Nqu9L9nvxx2dQcNpa3cJ8oM1/x6tSwE4ztj8zdLZQrkOLsCXZrKIN3cLGGOMsYEcgNRibfJp+ZkAin0UYb1ANJLgIZAi6j6aFaF6y3E9BNICpSgs/fWlcAYgnoSqpMfjegiEdqwNU1Vmmpel/bkAGoMe6WlrRGoCcBWd+fsMwKhZanQZyltC+b8p2DR+jbADUNmzcWHaslEUgMrmfcCNXbR3misAxaX5wPhLxr5bce0fCsdPoBwRyvovgElUgntvW/PFyfmjr63G6ks0HA3gxB4hDk9/bgH+xgXYD4uE05sPb2JAY4wxxgFI3VaphzlVJqq9dgB5fkm8VHEJAjArdgIxu7CtMj8+AD3dAAokqe91BmBv9jOeAs6hGWFJOvXpRFkOxStJKDUBuGmq6rr5IDs/UcNDwE06AbgDZPweZwCO+AEaBWDGKCg3RqjhPncADoaynkY/QplAo2XAhr3qz/0gNz5Ww5HW/HTA2mPBBpDf+3xaeSEXYD8cOSxi1t3fh4GNMcYYB6AfSr0eN8FEndVjPxsSAdDxnDOAuVUJfgYmG0B12CpFRwDWymcEYJHZkqQZyDTvAOwyv2hpSgKQ4mwFtJNq/AD4QShTYPjSGYArYfrEXmWXGh51BeClNCg31OjjM1C+ELoSh9DJpp0wfKjGB8z5e8zPjqvxIxj+NBvU9vYal8Pivy9AtuGvv4+c3bH27MO/t2LgY4wxxmcAraut7gCMAvC2aWrclSAAy0F6QuWeZwSg14o+57jO6jx3AOYBaGnTagGocixwRF9BSgKQTrX99r72sxqfAN62og80dgRgujMAH9kLvu0KwM0g29RoKgx0SnGyvu6YAe192krzHWFJSff3+9o7QuyC0+fimS6DMcYYY33hAOyiXHMFYLGUHsRr9LsC0JIFrbfHm+8OwFYAj6VW4QzAwmcFYC3ilevTkCGptaYkANNFvM+BU+qPn6D96AzAb50BOB+GHc8IwI8SBOAH9HAvtNfVeMQG53yMEvE+PtN3AE4bDMYYY4z1hQOwxO6qcEQp0Df8ReAScQegxRuFKbfSFYBlAOqk1tlnADYjXptOUlqKhFISgCdFvLP66uzP0D5LZgDSse5DuyCUic752CJcpsNhwhGX2dx/jDHGGOszAO2uyvTLmCb9oy8+KN52m8cVgDZfdlltI0g0EB+AhY7b/dr6DMAeAC3ttoBeqlVqxSkJwFOUaTNs4/VzwSugHU1mAD7U9/0RfT+gPZ+MFsriGbabeI5FL9p/jDHGGOMAjFQDCElLfi+AcvPewM4XfhewryIPSmt8ALZTFEqtqM8A7LC+iK0FQJ7UelISgIvpyVvEuU4/3AztYTIDcD09cgrtbzWe7ZhPLqnxZ7Alpf8YY4wxxgGow6rbSj3PYwDN1jMX7VYVPi8AfWH7WvJjOwBdr5nzNfUZgF4AHdYR/bGPohFJAt0pCcDd9BCIucqyayBbhfII5FpGMgNwjLALb7MannTMt9ZaD21i8vqPMcYYYxyAnZRg0TY/jcMlUELWOzgycyTJRndNmfWi4F6PdPA0ZVajUpJWq98K7Ou2pVSM+TQqQoIAjMYaMdwL9AYliUQbS0vUgQKwqtLfg5QEIHbFfkxlw0oxdcUNAGso3VbrE4DJDEDQS0d2/RL7kcA3XAE4jmJ0MshdMW3uu8noP8YYY4xxAJJCkNKsoqwakB6ffcouGJae9qj1+l8/jToqsqUtj2aV+2R+G23zxk7bNZRXWb/e3BXKyc7qTRSAeTQjuzJs3uXX6A1IfyV9kTJrKx43BBpK8NICcNZly3oAR4Xy4cUNaZO+UYOMNDOvxK7lk374ckRyA/CuUDZ/PfGzy/TJ8U3O+dab4taMm4Kb1+eo0a1k9R9jjDHGOAD9ZXAqjUhDVSNIZjXsRzkKYAjImHJjVneXMavGZ+wIQwst3QRLcYIA9MLQoIaeZpBMvWTYuvCrNda9rAC0zdMvfiOHpwlyB8qZDGFZmtQAxElhO3whbj7Z/aYgvwmyIkn9xxhjjDEOQNLQjZiOfGmqz7U/DEtDp/6oTdqCT2BpMXctA2mmYaQLWkFVggDM7wEpNmbrMWnqNAMzCkO1tz1FATj6rLBcOgHDFqsAdyxMbgCe+VBYZj9wzSfzpwrLjq+QwPxXvf8Y++Kzf7alIYUYY4wDkOR7a0C66yqlLVyUa3xY22Z/lEdBViQdcsq6oUR72qWlvbkX6PYYKxdlAsgs9Oe4A9DiK6Oj9OhxexOU3poiX2z5ukaqyWyZmgAk/3wzQijrfh4K086Hc6gHr26alMwAJD/+JMgnVwe55mtDH9LaYtrKo0js8//p/mM3x5368qOVB859sPHWBbySbt/fQ2e6v0ZKMcYYByDxVFXUB3wynj9Qnh3wyziRzrCM56NZ7tVyfNbWnMpAX/3ZaR8kUp/d6Ytfq7P8P+zd51sT29rH8VuD/tQAsaJEgVi2BDtusMVgZUdF8DnbDbKFc6SpKCqy7QqIvfv03nvv9f35xx7a3GtmkZlkZYIp3p9Xu1hWcq/r4ntNZmXU35jNAHS34Ghf7UmyC1UERmheNHS+XX0sRm5ix1b3nY6Tp8MLqRCERklkXW1VGErjAyo8JQcx4wzNAyGEkAAsYD4CMOdEdOnHqqaNEeCbmk0nbveHKFvExL5S2C2hwhNdDEsZGVu0gn2gL69iBVtLs4QQQgJQAlA8+NRTCYe24ZWjlA2ioRlO56nw1ILVkLFbYPfpy9sOtoOEEEICUAJQzOjfCIV1rCThX2wxNCup8GyB0iABKIQQPkkA5p4Y2Q8XN4+R8Ot76NZT4fkRymcJQCGE8EcCMPfEQBCuglfJ7vgJdpLmR+cJtoGKQUkCmhrKFR9v8lOwCM1HALaeYFslAIUQRU4CMPfEygQ8tPeTzV6wdTQ/noL9ChWDS9B1Ua74eJPHO2B5Py8BuBusWQJQCFHcJABzT/S1w1P4tQSgH9Ea2D3/BrhViAFICxOY0TwqASiEEH5IAOae6AwihcgRCUAfXkF51z9KVB4oKcgApNXvMKWqhCQAhRDCDwnA3BMtSOm2BKAPtWDhI5RD/t/kibFzN17UEkkACiGEbxKAIvd5wp4/LuvvrO09PBiGTbhbAjBzK8G6qLADkEkACiGEDxKAuSdaoES2hGhWw6MIlGsSgJnbAnZJAlACUAghJABzTyyCcucJ2TxpA7sjAZi5S2APJQAlAIUQQgIw90QflDFyuJ7QY08C0GcAbpAAlAAUQggJwNwTL8BqouR0AWwVUXlgCpSBwLRj5LDo6qXBppaua9eHaNrRACunadsCloU0bdnOx2fP3tzaTfQkMGkr2LvADNItC7AR0tQG2AdyqPj08GNXU13PpRWrS2iOIwF2jOzGA+y7Ob9098yf/OJG096mwU5yiAamXAG7F5hxkiYt1P7UB1c/3ttbvd+ZR6NLV27fun/T/hsfB0rIS/y7vh3Hq67UnTl+qII8eb7JHsO5GGCdpOnu23K+rmnz9z+fnfFIgL1KJwBfBSaNQQnMWENkMkLXBWkBaLBlHf96lDQVAbaQhBDCnASgyJH3YL9Kmg1gL4m2Ibn7ZHP9Jix37k63UR3YNpo2DMvz6Q7ahBkVRPeQVCnpmsA2k9PJRPKf9WveNEMpreuLpXuNainYr6pfqlZNxx6XYtohcngAF0tpUgcsVUQUK6vhN4Ut3xqB0nz8iGvv7KmB0tH1E7nzfJM9hrMIrEnLoBtBzApWjei9lU4A7kByq4gMRmiwIIMt+yNYB2nqwe6RASGEkADMLdHiXlK0fj8bSCsAVzfDrnFhGgH4LWAWgHqb3omTwxhYYh1ZnnSFoel41JCdAAwEAb8BGOJBqAAca4Im2DNCSRx9HITmZq3/AOTheAfgSAvswpezG4AGIzRYkMGWXQvlO627S8HGKENCCAnA3/ta+u8PJADzRx3YAfKUOgDL2uEUfJoyAN8gowBsaNdqShkEayHLoXYk0Xg0GwFYG4bvAIxXQQ/A1jNIIriC5ricQBK3h3wH4BukEYA/VUJzLpsBaDBCowUZbNklYIfJYQCsbYIyJISQAPz3ryUAf1MCMH/sgvLJVwBGr2GOYEWKAAzAPAD1cP2RHDrAfma11C4kF3zmPwC7I/AfgB+hB+D6eiS3VQu70CCSu9LtMwADSCMAx8KY42UWA9BghAYLMtqy2/UXzobBzlCmhBASgL/xtQTgb+RPAIpzUE598hOA+5BEddw7AJsyDcABsLNuywyPz7bUXrg6H/cbgD/CfwCOt+kB+LoSbk5EyabkLNzUNPgLwKY0ArCvFHNF1mcvAA1GaLAgoy37Cqy9nGziz8EClBEhhIjGh/7vawnAvxyKRyk/iIWwGxzPOABflyKZN54BeBSZBmB5GJZSR+fsmXNbfmwTPOzxGYBHn2chAF9AC8CS53D3LSnxK3D3Q8xPAB5F6gBcU5m8UbMWgAYjNFiQ4Za9AvaWbH4Cq4xRpoQQEoD//bUE4D/nTwCKoTbYdeyrjWcUgKFmJPVNpUcAtjUZByCrAut1OR88xt/D5yH4xF8A7of/AFxyUA/AOnj5a2Lb4eW4jwDk4XgF4CCSe5etADQYocGCDLfsIbAesvkW7DxlSgghARgL/cNX8wlw/gSguAtNZc/KEkpi+akpsDk17QVNeQSnRATMLQAZN8Zg8r+i0vsbrLtIKW9XBdNKUzrbYXNq8fvBakf0Nk/4CkB4BaDLW3bqqCMAGQfgBtgcfL9nxfb3HVAqJ2jWh6C9XB7f/9mO40tg84R0Hm+yPpzUAbgamjtgRgFYdmpSeO4b9dpghIYLMtiy3QlYGsnmLNhrEkKIzG8C/O+v4hzw7/2z3AKYT07ewVwbB1c0kMbzSSALgrDpOHR6iNbUDpemF4CNTZv3bzqICqOHVLRGVA9Fib3Vb8u/uBHK8w0xmrTm+3Yot7MQgHeqq+41bSw9ZPIkED0AE803h+vORp4TLQqDHRyL0ZShgXCSi1gHwILbx2eXWwN2z+RJIB7DcQnAetiE7z4ZpYvbPn6j9ZafJ4EYjNB0QSZbtg5sObEG9YtryAchhHwGHPrLryEA/yQknwDnlbcJJJP4YcO69APwGWxuXKQZT06lDsDSnqM0rXvCKABpMOl1rh79tvwVUDZ2862PQbBgg98AbPkUmymYhswDMLLzCE175XgRTd1kCQRVroRo2tWk34fyqgZsm48A1IYzNwBHYFO/nmZ0b8peABqM0HRBJlv252BbiPWCfSQfhBDyGfCD1j8q/v7741b5BDjPPISLRNPli2kG4H4ow3GybIukCsCO1cTMAnAZ2CVijfpt+S1gzz8TG4CywV8ABneQzjwAq0eIhSKqd8pJua6S55l+ZSr4hJSRRlh2+QhAbThzA3ALlGYVv+N7sxaABiM0WpDBltWOHLUQ63L8Oh+EEHIJ8EHrL3+ruPPvt37Z+kAuAOabv+6Am5pAWgFYHgRrDJHyLEUAhj9QpgEYq4TlClkq9NvySxJgL12+SHCTvwAsI/8B2Fye/PbGoy5HJYZpSne788IU+6AazkcA8nDcAnATWGkFKccSWQpAgxGaLshoy1KVKu2LNCt6CpYD5JcQQgrwn/++mPvv7/9Z+i8fnRyEq67uNALwKlwiJ97sHYAvDdpEdxuWxDjNegH2Wr8mdPAB2dRCGfETgI/JfwAmlic/4LyYHMbDmFWpnU5t203MWULLMw/Al+QdgCWlcBYpu5GlADQYoemCjLYsvU3ydelHwQ6TD0IIEY3GJgtw4s//6B/+pgivA/7W3/zD3/35xGT/xaJREvnmeiPc3BlIHYA9YHcekN0GzwCsfOAjAJcmeQ7rYv22/HqwS+SWsof9BOCHLATgCWKOa1MDrs8/2ebMvEFy2g7LZfMAVMPxDsCrrseN12YnAE1GaLogoy1LrW2wbKVZOx356YMQQkSnrgGGWicmRovSxERr6MFQXPovL4X6NofhYkvKANyvJxL77BmA+8hHAFINLDeshAjqt+UHwWrJ4TjYZh8BuJeyEIB/7fLXPSGn97A8pElhfURspXptGQfgPkoRgFvAnkfJoTErAWgyQrMFGWxZ/ZGJ7+ZeZa0m34QQUoCxyQQMtRal0GT+xaT/8tfugQtBJDWQKgCrwQ6RU6NXAN7yFYAf53w7W5/+lzWAhR+Qw1+DXfERgMPZCMBFZDMGVnXDaYnjAcgLwJ7fcKpTrZZxAN5KFYAfwarI6Ux2AtBghAYLMt+yRAGwYzRtQUK/yiqEED5E4/FYbGjoQREaGorF4nL/X34bf3q8PoE5wq9SBGCN60Ua2u8VgNd9BeA2sAr9CtkB/TQE6snpCFiNjwC8lo0AbNWPeqR0Xr1+bwcyDsDrqQJw0PWzWXqRnQA0GKHBgsy3LFHslN6LK2FJdJMQQvgWjUbjkxFYhOKT9SeX/wpAef/xA9BUpQjANrC15LTLKwBX+QpAUut8oYfoYZrWD3aTnCbAwj4C8H4WArCU7K4hDZuJ6DrSUJlxAK5KFYAX9BemPMtOABqM0GBBRlvWch6WC/qvuklZIYQQ0aJFokCUvNkLhw+eAXgRSgM57ZvHALykHZddO+e2/DKPz2rDYGvyKQC7kIYW9eK8BecvAOvBxvQ/PksBaDBCgwUZblntyHE4RJOilbA8o2IhhBBCrKqGzTnPACyBMkFOj+YxAD+rzBl1HgLYRDP2gPWQ5jnYonwKwF8gDdX84lIJzVsAbgTrJ6fVWQpAgxEaLMhky1qijbAso0lPVBCWU9EQQgghovugNHsGYAhKCTndnscAJBWpT52PjDg09/LRZtIEwRbkUwAOpxuAt3IcgNVgveT0NksBaDBCgwWZbFl2zXk8+jAsVVRMhBBCiF+FctErACni/lCsx/MZgG8chyJGg3Nuy+8Ha9FzI1/vATyebgB+ynEAnoDrOdiX2QlAgxEaLMhoy7LvnOdqrsAyRkIIIURh2f2C9dMcFVA+ewbgRrBl5PTDfAagekrYO0cQ3UxyhHQJOY2kfQp41ZcNwC1gR0+7OeL4FBIvTruieQvAHrBz+mv2H4CGIzRYkNmWZc2wHCE6yTsv0kpCCCFEYRlKaHfNOcTDYLWeAbgJbCc5xCPzFID6z+pF9oOaK5J8iVzwIjmMeXwPYA/ZXf2yAXgVbC15WQf2kAxkKwDPgS0mpwv+A9BwhAYLMt6y+hxv2f/qQRJCCCEKzTtYvomTLhoGe+0ZgL/q+pO3E/MagGX2H+vvktyWHwRbTQ7n9XvLXmqBw/Z82QBc5bpkTVTl+7lcBOBlaCdjWazNfwAajtBgQWZblh2D5R7RICwBEkIIIQpNHdhV0h2D0u0ZgN+DhReQ3aP5DcA1XAd1dDrZbflnwT6SQzPYYf16UiXZ1X/ZACwpTd11+ku4kosA7IPbqdvV8B+AhiM0WJD5ltUW0jakhlcZIyGEEKLQ3AZ7N0SarWBt5BmAy+DyQ3o8Mr8BSPsxK9z6Bpa3xN6A3dlNNv1QRvSzHnhLSie+bABSk5oJeboP9ioHAbg7CLaJ7Bb7D0DTERosyHzL6jdnrvoAy20SQgghCs4hKFVaAS5sB1uSJAA7iQ1FwNrWkXIOvgKwjlJZCUvgF8luy1+XANtONpugXz57BaWmlSzlzV86AMvcvs849kNzdd3w+XMvysY+a5dot5LDx3f1LVU91/ZsWMlT8n6TDQOQ65t9ImUZ/AZgW9R0hAYLMtyybH0pF+MeWJaSw8jYo4c/xUl4+X927oK5jSQN4/gTfBSPIQwKsxxlawO+mJmZ7sLMWInXDrOZ71Pc5zxwJM07rXFv9VyVrK16f4UB2+1+BX+PW1pzSimlyuL0lU5BeCL/6RNSDoXXzA36LhT7edYeIQCfG7+Ktfpykim346HH8l8xIy5i6ByzvpH3FF4Xp/OjjrkOwBaPaeMbISRpnDzrkX8hbCmUV7dcNtkpAIvoO7IbaXvGowVgCX17HEfoviCXm6x5HXGuIvwabe+zlY8+1AmlVF5TSr2h4A2lL14Uzx6idDXk5R49LciYpfB4GStqizxGCMAz9N3Dn/nELAUQHtI3vhUp2+jz1omzfhmHN/wAsO7sPuY8APGWGRXLyNgRZ9p4Nf7nLDNGRQHWtzKjDXDYZLcAvNlO3+X1+OV0JaMFIEaZMZBwHqHDghxustIks/RDeHGIv8T/QD5TSimlRtoZcKTu4PzL5h7jbzeHBmNrculfVbP4n+ujFLzh+3tuTk9WkFECsIXC/LaCe/0/sLolmvbVQvjRKhd2qQwAtl6hcAkpEwxob93c6pFrEIA75EAOFGPFxi5mndsrG2dG4bN6rCi5EzcO0zlsslMAopRS6ZPPZW3by8moARiTn6xqw9fkgsMIXRbkcJOV1nk07Q5/+cjc78hnSiml1CdamdfUkjR0Y8VP2jkEIE7SMI3VvR+l4Q0CGjxKlZuPjVKq6EVKfSFDeV6OAxBNFPoOPqtKPj0md8XbnTnKJ7R3D514dKq7g0IRJPsmuwdgp0c7twAspaHGYYRuC3K4yQrlNFRA+L2dGSeQz5RSSqmNc/xT5cjYQ8MR43yUIf439wA8TsMMLO7SsAVBNbTxFpDxd4aa6Ml1AJbEaFWDtHla3YbJvsmOAYh3DHc0UgAeoKHZYYRuC3K4yQpPaDgH4TR9r5HXlFJKqZHLpF3dD/i6aehM5YHHMBNv3APwNA2vYbGeQXMw1D6mxQR8e+IMMVeS8wDE1jgteqqRdr2VFn31MNk32TUAS1oZpnw2UgB+OcKgyw4jdFuQw01W+BJn0AiEn/TFkN+UUkqp3aO06im2nrl7KN9RxnSsNkIAosfWdKbaywzoh2njIa7qUgLCWYaYRe4DEF8tBVhRL6d32NJ/O2Gyb7JzAGJLH7Md2RgtADFGQ73DCN0W5HCTFV4b/3fVo5sHkeeUUkqpzzFa3F6HgGcMOoWUhx5N8U2IEoAj+xhUBotL4cfyhZK7DBd/goBEM7PcwVoEIHYf5Soe74K0q5yruJzacJdNdg1AtF1mloeIGIC9dQz66jBCtwU53GSF7wyoglRcyIwk8p1SSilVe2Ccq5j7DtMNBvQgraCPQX3rESkA8bmPAQ9g0UAphjCTHkMcXoChdoxBhR+wNgGI4oMM84/hXgQlatoZprseKQ6b7ByAmGqlYQJRAxAtFQx45jBCtwU53GSF90cCs7iJgCGmVe5C/lNKKaVahvoYYjxZgiyJonEK3nuk7f5nO4XYAiIGIEaaKb2DzVEK5xDqzMuTNBy+swvZHo5SqPiOHAegcO8xsxxvRLbp4x5NPTuR4bDJ7gGIXcHbzr6viB6AKH7mUahzGKHLgtxussJLCrchyPeraS/AX4JSSin1fv1YBQPOX/sjgVDfrp0vZEpf6U34GofjTIkdqIVrAAoFB0eZ1voBNh8pjGAVxR9i9LU3P08gVO+tQ0x5vJRA7gNQ2LR4Wa6559oZhCubiVE4emoDfA6b7BCAQsu5zDIrn32DewBKmwbm/HYbcBihy4LcbrLCTgq3YGjp+rX9W/DXoZRSStUvDSbHnl4pf/ps4ufSTdiUzR5Ifuw/sHTmBYK+tH1NDgz/VrSM/1eioWjmzuK5e6f3wm4rfcdg0Vgw+O7l7eZTySeny2CxcfrJuRP3F4qx9qrbvn/o7+oufzqW/LoONo0bin67W3r701DN4EjETY7uxZ4Hj4bu9lfJHxmiG3lYda7/3eDOZbcRui/I/SYrX3IUL0aWq2fvfrz/n/buYVGPMAgCaIcd284qtm3b5ja2bb9yVvfH7L+Z4JzX6K6q11EaANB3V/UtHwrZIekLAH+ExdW3fCjkblc/EADQlLMTs2VOFASrsmXG8GgKAHA720ZFOfA5275G/QCAF6P2bIh+57JtxbooAO4OfTY8el06kW3jAwCo38nMSZMq2/wlwK3MEzOy08UAAOq3OatObo8CYN2MrBgyMOoHACzLqqtRAvTOqqPRAABgaVY8jSJgZVbMPBv1AwAmZ8WcA1EEzMxu0+9EAwCAKdlt1fAoAsZnt5mbogkAwJzstPvI7CgD5mWnwd+fRyMAgH0nsmXAw+1RChw6mC1rvu6JpgAAi37Mu7/w1K+vZ97fiZJg3cdPh65vW3X9+6fNAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMDf6TcxkeBbbNGeNQAAAABJRU5ErkJggg==" />
  ),
  category: "cta",
  attributes: {
    contentUA: { type: "string", default: `Ready to dive in?` },
    contentt: { type: "string", default: `Start your free trial today.` },
    contentUB: { type: "string", default: ` Get started ` },
    contentUC: { type: "string", default: ` Learn more ` },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;

    return (
      <div className="bg-gray-50">
        
        <div className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
          
          <h2 className="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            
            <span className="block">
              <RichText
                value={attributes.contentUA}
                default={"Ready to dive in?"}
                onChange={(newtext) => setAttributes({ contentUA: newtext })}
              />
            </span>
            <span className="block text-indigo-600">
              <RichText
                value={attributes.contentt}
                default={"Start your free trial today."}
                onChange={(newtext) => setAttributes({ contentt: newtext })}
              />
            </span>
          </h2>
          <div className="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            
            <div className="inline-flex rounded-md shadow">
              
              <a
                href="#"
                className="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
              >
                <RichText
                  value={attributes.contentUB}
                  default={" Get started "}
                  onChange={(newtext) =>
                    setAttributes({ contentUB: newtext })
                  }
                />
              </a>
            </div>
            <div className="ml-3 inline-flex rounded-md shadow">
              
              <a
                href="#"
                className="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50"
              >
                <RichText
                  value={attributes.contentUC}
                  default={" Learn more "}
                  onChange={(newtext) =>
                    setAttributes({ contentUC: newtext })
                  }
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    );
  },
  save: function (props) {
    const { attributes } = props;

    return (
      <div class="bg-gray-50">
        
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
          
          <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            
            <span class="block">{attributes.contentUA} </span>
            <span class="block text-indigo-600">{attributes.contentt} </span>
          </h2>
          <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            
            <div class="inline-flex rounded-md shadow">
              
              <a
                href={
                  attributes.contentUB.match('(.*?)href="(.*?)"(.*?)')
                    ? attributes.contentUB.match('(.*?)href="(.*?)"(.*?)')[2]
                    : attributes.contentUB
                }
                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
              >
                {attributes.contentUB.match("(?<=<.+.>)(.*?)(?=<.*/.+.?>)")
                  ? attributes.contentUB.match(
                      "(?<=<.+.>)(.*?)(?=<.*/.+.?>)"
                    )[0]
                  : attributes.contentUB}
              </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
              
              <a
                href={
                  attributes.contentUC.match('(.*?)href="(.*?)"(.*?)')
                    ? attributes.contentUC.match('(.*?)href="(.*?)"(.*?)')[2]
                    : attributes.contentUC
                }
                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50"
              >
                {attributes.contentUC.match("(?<=<.+.>)(.*?)(?=<.*/.+.?>)")
                  ? attributes.contentUC.match(
                      "(?<=<.+.>)(.*?)(?=<.*/.+.?>)"
                    )[0]
                  : attributes.contentUC}
              </a>
            </div>
          </div>
        </div>
      </div>
    );
  },
});
