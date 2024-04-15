import { repeaterData, RepeaterControl } from './gutenberg-repeater-control/index.js';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText, InnerBlocks,InspectorControls } = wp.blockEditor;

const {
  PanelBody,
  PanelRow,
  TextControl,
} = wp.components;


const date = new Date().getFullYear();

registerBlockType("gb/simplecenteredfooter", {
  title: __("Simple Centered", "GB"),
  icon: (
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAACgAAAAKqCAMAAADB4vcFAAABiVBMVEX////n6Ou9wcbr7O7s7e/6+/vc3uHBxcrf4eT9/f3Gyc7e3+Lv8PHx8fPq6+3Iy9Da3OH5+fr39/jP0tdlbXl4gIry8/TX2d3P0dV1fIhpcX2+wsfN0NXg4ub+/v+PlZ5LVWOaoKjMz9P09fafpKtSXGmmq7PT1dnW2NtWX22WnKW8v8VtdIJ9hY+3u8GSmKCrr7aLkZtgaXWxtbv4+flUXWpaZHH8/Pzz9PXR09dNV2Vrc39PWWZdZnLo6exYYm7KzdGlqrJMVmTLzdKhpa6CiJOdoqvU19qtsbh7go2Ijpmvs7qprbW0uL+ztr3t7vDk5ei6vcPEx83i4+bm5+nCxctmb3vZ29+2usGUmaK/w8ikqbH19vdRW2hzeoeZnqfj5Odia3eJj5pxeYWNk52GjZdvd4J9g496gI2Ei5SAhpGRl6Gip7Bsc4Hs7vDU19zBxc2utL6co6+7wMjN0de1usOorrnHy9KiqLS0ucK6v8ehqLOfo61rcoB4fotvdYSEipZxeIV/hZGdMCtHAAAmxUlEQVR4AezBQREAAAQAMNA/s5cSblv8AwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABkVceZZecOf5rK8j+Of6hUKFCgCFBQy5siQEUYKC1IuVjFAUEFZEAYUIWKoDAz///TH73n5qaTwy/E7HLbTc4rm50s++STfk/S927QWCyuRnU/5mtpTSjQFmtXI+mIxZK6QSIW61QdJWJGV3dK/wN6YrFu3YkHvX39Nz3z4OcDsbSke4NDA6qn5pjv4aPHGd0Nx3EcxxmGEQWUhVE1qicExgbT8vUyrkYyAZOSLQVtqqMUAXJPU2p4U/BMd2IaZuxnHv78N/okzcKc6ilLgPy8HMdxHOcuFIqwsPgfBODzXG4pqgAsLV8bKoLX5gLw1wJwpfrJjQHTcTW6PqD1btLSW3hhP3Pz8zAAW8tj/rVe5nLxegVg7/W5ekvAK93q13c6juM4zkO8VV7/BwHYD9moAjAnX+sgpce/FIAuAOd1LdH+O6wl1Ng6wWNdd+L5YvjM7Z8HAai4+S/boG4B2K5rhTdrsKHb/PpOx3Ecx9nk7fW//rcCUM9XePeLAegC0BiHdjW296yMs5LQ3bn5mZsADNU/AKX4NLmMC0DHcRznv655la4pvNHab8bCwFasNhLiD2a2X/bL2EmnZXSnH0vN6RYYSac/RBqAGmYtDEBro+9Dy/bSqDSZvhd5AFqDTAAmWndnlhIKdbbN/9EUeQAuemxJ2ku3S/vb44vmw/o437avUGIvthVul/ofbD/sVnQOGHkBj/79AndbEzLM3mxSCh3GttMdCqUO/9xditv7zeu1n7n5eRiA8XS6X3qcPoKudDqp/uq/GaPpdEeUAag3sCdfsm27a0dqrx6u9n7hTn94j7S/2xbMtW67k56QksefmqK/q+M4jtNYNijHP39hpiYAu4oAX8ME3F4AGDtJqOoYZGwyLE1hrEcbgHNshgFob5SS0wClbfWyFXEA2oNMAJ72AlQ+yjisAKx+i0ccgDrju586588vgJSkzmmqfuzLmCoCFGfl6/hJ1dm+InII3RpkTqEt82FuyAj2njXJWFoGKJ2Myhc/KQHkX8vefwz2Mw9+HgZgM0xIwxiv9XmM32Vss3ov0gAslNj1L/jUAxiOX3Kuf90v3OkP31taARj0PwvrtseUNbwK2ejv6jiO4zSWIY6kcwZlZKFllZXpIhTfyLcL5R9rFTi6KQDT02fA9PRupAGYKPN7GID2RqW+grdZgfl6BKA9KAVbZYrTKxCUWItH6eyoD0aiDsA+zv2AuNzEuxhKSaPLUL7Kg2e2n8DY1fAytOna4xU4+OvyCxeLisZTDqQtxnoU2AWW1/Jw7tfy6BAUrwY9yg9U1V6EynQO8v261jMIC9/mVsh12vuPwX7mNwfgu2mgb3r6UJqjIuMrm4o0AOMe25IKg8DZBbwNAzC4X+3OZviYK11crcBgQZJ122PK43DwbCn6uzqO4zgN5T5MSF3QFH71fDk4zCj+Oke+4P+kxElByszArBWAdfodwMIaudMwAO2N+oZ33CPt9XleHQLQHpSCsS9tcWUOzyi169oBl/2SXkI62gDMFNnwAwJvyj/w4g/ykwnpcZ6DuKQdmI1LmXXKHZKOONiX9KLM34pEvMy4lPSYkvHAY7hTSozj/2hxk1w2Ln2oUMlU9+bZPJUSbZ55jy2MZTNSoY++hLX/GOxnfnMA1vxu3SM4VNULeBhtAHZDt6R1eLIj7TxljHPV3i/caYZ7P0elxXXYvum2x8BJUor+ro7jOE5jOSGfCb5zfVnw2lX1B34ojBYZTKjqKRzWOwDHtq69+56n943CALQ3foR3qtpZoA4BaA9KAX+qqqnIlaRT2FfV7PjjaAPwGAZMQLTI955iq6o+lP1a3WJFVYtH2x1SZoVdVb08SSsSbdAk6Yo++XpyDMb9dO3jTNI4q69VtWQe3ibLnyVz9QFJb5lTVefwcdzafwz2M781ABMrjJhrUSxEG4C/MbYodZS4MksG4Vzh/ewAHPL3ZS74ftNtj+FIvujv6jiO4zSQxQWe6NoRveFXzxMZa5xJirHaJF8hz0m9A5DA8mPVBKC18ZyLjHwz9QhAe1AKzmS8wxuVDuFhPf4UcLzFYznuB0QxLt8B4zKG/crYoPRCoUyRvxSpS/NRtUBnUKw0y7fT1ZWQesNBS117Qa0Zeb/lruhN2PsDx2A/81sDUOvBH0peZlhRBuDnJ6bYZigl5TuFc4X3swNwXb5XDNm3NfUf/V0dx3GchvMSWsNwqcrCRxmzEJeGqSjwlqF6B2Bps6oCXC6GAWhvXOGpjPv1CEB7UIpw0SGkpUKZhXfPowxAvl/76sFBhwmIQfk6YUnGDBUz8KIlLgWu8EaaFJ1+j20/nYu8D9Ilr5C/d1c1YngpGd/8ptmAy0nZ+8MAtJ/5rQHYan6yBxMRBeCz62vNDa3CeULSHAcKFDkP72cHIG3yTeHddNtjSER/V8dxHKfhnLOsqkyeI1VlYS+MQzqlTdYUGCfXIL8D2PE7zIUBaG1MlMLqS5WiD0B7kFKEM3ogJukPD7y+V/ejCsDQWbPC1KkagHLFWGA1LmkEKF/Od8r3YQFWn51kFxWNLUpJKYyemg8z3HtfNWahEsjxVVL8K1AZjn2295vXaz/zWwNQFxxJ+kQlE1EABkrf/QU/uVTgjPNwqRWAYaA+ZNW6bdi50d/VcRzHaSyjwJgPiAdfPf0y7kOrdMFTBaZYzdQ/AI330BQEoL2xAB8VyEUegPagf/9F0EW2/Y/30gMYmowqAE+ufZpplREGxEtqvdC1j4NUXd1TVfKoDFCeUSTOap7koWo/zHBvUjXWqZHXtcXZXgDvJGXvPwbZz/z2AJynvCj18kkRBWDf9bVG3k/tSOFnYFz+QgBat60JwKjv6jiO4zSQGUJBM2XhUEYL7EjTXCnwibJqv0N+1jEAezymwgC0Nhb5JKOHOgSgPSgFszI64Fi+0ZdPlqE0EfFfAyPr/wH84zQUl6/5+GgFFvrli7+Z3QTeKwIfIGSqZ5qf8oV736jGLJyG9mW0bn37Apuy9h+D7Gd+ewB2lHitbthXlL8DGJrmhwJDvxCA1m1rAzDauzqO4ziNZJDSZADWgq+eKRl/4yWk38grcMkz821TUFWmXMcA1BknYQBaG5e5DHMh0gDsgtObBqXgu4wlmFAoW2SwvgHYbC5uiW/A3wo9XsYr6O79DdlJ44JyXNIRZdVoDi9qPIRO2ZT8BkvW/mOQ/cxvD0Bd8V3rDKo+ATjMioy49wsBaN02DMDI7+o4juM0kCaYUWAWL2m+eubkS1ywab5c7svXv8DvkvahW1XthAH4OvIAzCwwEwagtfFvxlrlO48kANu/fv2gqvfkMjcNSkElLt8IxbikeId8R+TqG4Aa4kjGaML847N8Byajm+VrgXbduUyebwrjnbZ/fZitG+8S0jJrMv7ceCN1lGiR8Vy+5oz5R4l5a/8xyH7m/38AFhT4SLGQZ6YuAVj74S9xYwAW7AC0b1sbgBHf1XEcx2kkr/D6Feg0iZAF2oKWYVdSfIWDQtBS3qmkTM58A33+GQRg3GOjHr8DuB8GoLWxs0zvqK5tEUkApr7wXtfipibsQSngRFUTq3yX9Gks36OqYfrqHIDvKLUFLVT+JOlH6dz8x14+SS8XPNMHU3wp6M5NwEsFVPELNLUSHDN14H+627AVLGJA0hoL+6q6V+xtk5p72Qr/eLO13xSQ/cztADRjuhWI53iKN1qnAPxcZCjld1zeDkCz0w5A+7ZhAEZ+V8dxHKeRVFhTaJAL89VTKU8ltT9b4iKha/eLXN6TPq9Di6qu4HygKfbPQq8JQP0gP9ExGkkAFu9XPdj9CYMKA9DeeDhGcW17fJNvxSgCUNOUZncyreewrZsGpaDC+Aclp/IU70lqg+/70uk4zNc5ADNzeDOdUucapCWdwLukEgPf/Arp8PjnMKGOWJlL3b1hyosK6JP5HyjtRfrS8czh2yDavuPNv1B/LMeyrvUPke8alSaHyCUlLVN8XVDP6wvKCWu/KSDrmd8cgPEim3vNcfmOgLeqUwBqHtaWFheXNlfzVgCGO60AtG4bBmDUd3Ucx3EayCR8VGgG9qQspdYipTyQ/yDfoxKr+QMPZuXr6KXKG9gMAvCPEvAqkgAk9HWnJgCtjXrkUXX1ORdJAN77B/gCrEs3DUrBoyHIl8Dr0rXEdyCfB8576hyAim8C+RVgRNeSy8BQDkrvg3dBbghY3tedKxR5qtAp5ngvS1BcAF5l/L2DQKUEveaFdq7A6kEOxvzYPsyBt+xBLmvvNwVkPfObA1AjECbVJJCtVwCa91LOwaffrAAMd1oBaN02DMCI7+o4juM0kiOKKYX6PZ7434x6vAx4wzsKZM8AKmFINV2WYSirIACldC9cRRiAxcp5S0I1AWhvVHJjbnr9Y0LRBKB6/spD6cLknj0oBZPP1zzg56F8iXd5qt3yTqp3AOrzSA5YXV6SL3lSBLyLtHxdZwArRwXdvWOYVEgXnJkJF0Dp2UcZ/U+LwMLccxkf3nqAd9UkX+tlCchNN1n7wwKynvnNAaiNBdiQUWElUbcAVGY7D+TmZQVguNMKQOu2tQFo3dVxHMdx+pcOn6vGvYn0fkIhZT4k9S/JvYLqyt5oJDxmFI2OgZ5bBqUGJpoVSjQtTfaoMcT3HnUXFErtPWpfVKh54EGy7tedLCikQmv2hWqM3s+eJhR63p1tyty63zzzW7wIb3jBuuppce/R/q07b7+t/o+9u0SIAAoCAPoj7prQRMHdoRNZbety/7oufV3eu8JMGp2ouDJQAHx0u4inoW+w3/qaOKEAgL3M/X77DN/baoC+HR7vBgBggq2+Hr+cP6+u/e4e99+3g6tEtvU7BACYWHvZ46a3vwB9Sr7JJACYAlvRw4fjz92LSIB+raUL5Y0AAEyBxQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMCQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAVfbuIEtZGAug8MsOyALYB6sKyTMAgc03ZfVvaQrRQSf2oe43qtKBnje6JyERrvdBN+ESndTU9X4ImgmD7zv5S1y8VJw/AACA7Ue9M06dVGIGfWow8kd0U9X5AwAA2El/8VZq8HrIy19gfd35AwAAtKPumFsp76JXIaW0xJslpRT06iIf0Vmpp53rzh8AAMDrE77OR6dWdrXpQ2uA7aCqo+/kqvvY/CcBAACovQl7sVKU0U0jTzW6MZUX+rpwvwRnhkaKspfK8wcAAPB64CJFDbv9lxXgIOX4YCXTzHrj/ayjlHWpO/+ca+I0bMb8EPYmxsbJ+QAAgKi/jCnV2YXsVDXJvu6iwYgkVe2kmFnzAnSzPljdJ/q75PyzKb8QnJwMAABoNZPaW5xdtVJOr6rtwXvh+/v1RbegB3kQ9EFoW98Un//UTqs+WLeXis9fOn1tdnIqAADAzvqokX/022ylmEVV5ZFzd++piBQ9BmJ+rXE5/cWXn78TsXFVHdNmVF2jFXHF5y8XfUOQUwEAAPFp/0mF/kmPdeH8oJvBu/8+/bd8r8ilkgH4JcpNr7nFlt8Ali+dsXJlTSdfim8CO32LkxMDAIAFwCQ/9J9OShlV026MRhFpfd/dIrEQq9+CeVbE6mtswcqu4vPv9S2NAACAv7EAKBXOIdwnpx30zmDvVgm1whGMMXb7ASglTe8EYJRSor4lyokAAIBRH1m5aoZZf4xVAnDQTfB974NuhjoBaPRHiL3pWs1Umb+THa74/JO+Jcl5AACAbr92mlrPgN3tsEbd9Nnf5QNQ/CdPQDj95o+/m6sVgGY8fQACAIBeM/td0EshP9uL7hY6+X9TyQB07lUBpgrzX63ssmvh+Sd9JNKvJw9AAACwvBeAS/kA9I+dE1V1+vlTSjEaLrMeWSrM38sTvvT8MyJivf4yy3kAAID0XgCG8gGYn/UNqqlCANrPHoAIL07ZNqXnn5EvLmlOzgMAAIT3AlDLB6Cq+nztq0IAStAXjBT06jNM6fln5Fs7njcAAQCA/r8EoFPVPn86zlUIQKMvyB8MQLFxPWsAAgCAowf9+z8RgLLooaXG/Ft5ov1YAM5nDUAAADAeBGDUm3CqLeCM/+CPYKx6FV9c1LyyBQwAAEocAknH753pEEgmrvrUWGX+y4vlyVT3EMigOTkPAACwHETeWP0amFjnGphMZ8ykz8Qq85+t7LL6qWtgMnIeAACgPwjA014Enen0udXWmX+UXVHrXwQ9n/wiaAAA0OlNMF/kyhljGv3RFQzA5T524uFPwdU/BtJIWU6/zU52uFm/GX4KDgAA/O+M71wDM0op93GRdBN83/ug+etSklv1iSSljQcF6Obi80/6liQnAgAA4jsBGKsEoE16J9k8AOsX4GqrzH9dVXWOVh7YWGH+Ud8S5UQAAIBdjwOwcAcF1bSbI/3DKlWQsmxcdYerswffy3Xndb70xsqVNf2lxg689PqWRs4EAADE1wEYpZQ87tyUdJMml0dica7/TPZMquqlW/VL+BeAo96ZpBinb3FyJgAAwK6vAnC1ZS9hlkfOyaNrIRUXNdfUm3+U9vEjm0rzl0XfsMi5AAAA8yoATeFrUFo51KpqL2XZftTM6qSO5vsewHZUDd3e1TStFNTpGzo5GQAAMB0H4FS6PwY5NJQsECdiTH+ZNbdYqcXv7bLrjZeiukVfWDo5HQAA4I8C0EtR6dVea1P0FpLO656xkUztGVS8gcU1cUqboA9C2sTYODkjAADgnwegr7EB3chTTelNaOdXzYRGqrJJVX3rOvM7AJOVEgAAAKZnATjVic+hlV3tUCFCbbOMehOi+1yBy03p/gYAADDjXgCORspb9CoMm3gzbEK9M6idaePGOPmMft0LwLWXYgAAAKxf8wBcvZUavB7yf2T+vwOw8PwBAABsHO8DcIxWKjFJn0pG/ohuWke5Wdepk+IAAABcv8hV7J3U1PU+Bc2E5PtO/sMeHAsAAAAADPK3HsTeCgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC22INjAQAAAIBB/tZj2F8BAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAFsXd/PWms7xrHr1aniogVVoIltWOEBA2QpkaSsSekjUix/lcMogYNxWCK8w64Zhhe+WaeYXQU+Gmz9+5eO96fM537mZnbo29crhINnxfvzsMahkSSX3aTEfgO9zq7M/djoXC2mA2HMKDN7Hb2DhGQzK7A9yH7D/6Q/mO/k347jb+rkl3En6pmNzFwmF0FsJItYEjydh1DTrNR/Bu8zYbwegghhBBiM0HFGiqfZI59uUUo+i5drRMosSZdSzEoJy32mbs67q3QnoDnTY5V/JmF31Qyb/A3zbCGP9VlbgOeU34HUOImhmSY0PGUxQge6OEw/m/kqOG1EEIIIcTGFdncSW6W18hSCkEzpr1XXdjPmUm4duichTfbtCZV/91w6f2n9w02ouibtNjeDJ853MGDK2bgabOIPzOTY+8s+b6cYKLwLw/Aa5Lnzwfg4d0KnglAg6YEoBBCCCH+t+lNWl+hLFps6wjo8Qf6VniDvjkztwrAGLTcNy5pALQm1fEi2waA1Zw5h3uzjncHLLIexx85zLGkXiafYS/67w7AMttsPBeAigSgEEIIIf4F3rK3gfj74lV2AvEWT/HggD0ot4wD2OXd4NtmBMDdoHGOuQsgYvIArjv1pS/LngYguu3fOPXpMA8lFE9B2Yjrg69SqxH41tjUoGhdvocSrUzH4YnFDWDiwBv4FPHvBOhzJzHc25g+AAz1JC2eB7ST/OD4/VvERwZgcNp/8wmMFrI4sc3CuAC8X02Lx6AYhU+aWsEPwNmKDld8loz7P5eDcAQ+fzttvjJ4mUIIytNJYy6cenJgeNnZ8CzuRQ8r+msKQCGEEELM2WYYFYt99VUs0DkIXMt+hdLgNYAeF6A0Vd28z8bhWuEVgE02oSywhwehLj8D2GdDFc6bGslcZwN9Bf6GohKowLXUkskZDLyhk8LAqUoyxC5skksncJW4mmyRW6uYXLLJ9qR3J+044T7gEspBhqS1Euaausv6QX/UbBQAHDEDJcnucAA+nfbfPPE9ihFW2MQO18cFoL+auuQ6t8jccqy/grf9eY+sfw8BoLIGwChbJBvXeGAxmnZY9F/GLueBockji2S3GjwwtOzXLknrWPeO79qks6e/ngAUQgghRJZpzFnMJD+UaBZQ5BSG5O2cBsRp61A+M40H+9wHkOZnKLrNOB6E6cy6lan6ZPaWznI7xzVtRADetM2fyz8wcMY1PGa0aS6V6kzMeQG456x16qwv9LYumqYXmBanmOgsmWyH1Ht3adeWHVPdy82v7m2pY3H7AJg1cym4rpgdE4CBaSCyzfpy2+RNHMNKPMUhW/qYAPRX8wPwmOzdddlcHgRgNtdI10wWdeCiSF5cfAZCzf7zdlts5YMBWGbv6ki9TKKUcfg7iqeTZ2TjYos8Dh6IPF52Idd//prJDlxFslG85d7rCUAhhBBClPgP1lV8YJllfOMdhpRZBHDC7ftEyuDe7K9cAUCGM/Bs8wQBFywhwy/oi3VZ1oDLDK/04QDk1gEedLiLx+64tAEYZ+xtqPc2NwGtTdYMYC7BBXUnroeA1I0qVD3DTB4wOhwEIK/URRWsNa+RLm0zMiYAg9P5G+4awEaD+xhyabt91WV1bACq1fxL1VxuAcCJw0EA2u6XVZOFwN8AVmnlAezwSzAAHXcS0Rvu6UB0jeWnk5tsTQJYNH/NBg48XvZN3V4FULD4FcCRKlx9inw1ASiEEEKIHmfR4CH68odzKLCLpxZMJwJggY3Af/L0hdoqQ9DkCjwNLiAgleAX3sbQd8xGCH0bFj+NCMBrBLQ5g0fmWFcVpbeZVYW1jL6vVBmD75xSd2qqBxQcxoBDWnG1V28QgI6Bvh8q8L6x7bfsmAAMTh8PbnzYbet46ljd44h34wPwOnDpip+95/gBeAZ4JwIBuO/9VI1wKBiAHwcHO3ClHDP2ZHLbrsC1znLgADbZftisyGO4VvkTQMKseo9/PQEohBBCCMc0YDGGgRgtPFGpM+ll3xI8Vf6E74I/o+j7ySo8S1x5ElT0boA0F6Hsc2o4AC0dAQ3+wCNJ7kJZUOlX4jn64rRVp51xX93pGMoVq8AMv/iP8wKwDVdErRh1zAiAGpPjAjA4neYmxmqqexzwV3RcAKrV/Eu3vITLyA0CcB6uI+4EAvCYVgVPWPS+lfYLu83w48mIX+bzrAUOQPsVWHYrp8Fl2LaOST/4F15PAAohhBBijSdY5j+qfIpJzLONx2a3eQbXO3bhWXwYOuN2ZBAji/B0+Q5B+po/fsM3fszdDQfgbwRleIRHyjz1K6f1UFhxOggGYBjKOrPArp+Dm/7fAMIV847c8SMQN+vauAAMTt+wgnEm6ES9Dvw2JgD91dSlCLfh2eKqv33fFNOBAIz+JpeOpnX4ApM/2fmubHHm8eQK+V0psuUfUC4elo2pGVedk/jADpTIqwlAIYQQQqhKOqb1Bqg4DOMjd/BIqss7KG+YgOecJXhO+esQSonn8CT45ukj1qHY1KBMs/FcAKZZwiM1rsJjMzo2AGf990oHTrwbFYBVrgFT6nvPBqB683H2yK6LbLwkANXuSm1MACqX6TrJ1umIALR57+zx5BEf+AeU+Ydlw3wwjyOuQ5H/C/gVEUIIId7zxtCLNBsN8graFj8gKLrGTAiKZnPDL7ozKIumPX+fQbtQNmhrYwKwywKUJIuBLkqMCsAke/BNZGeALzyFEuc2xgbgPJQdvnVPTPk7jghAvcVJNBl+UQB2WcE4Pd6LvCAA82b92d8AKsb85xvybDgAu6xODFw+nvzApQnf/YHAsvMAUsxN+DR88Dv7gK8mAIUQQghh3HAfetki7d0QdrgWQoCR4ZKGgSWewxWyWIWraudWMFClFRqEzBLGBOB3vy73ee7/dR0wwVEBGLW5iIE0vwCb3PWftDw+AE+hZFgFZvwT66MCEPs8OmAPLwrAC37DGGE6qZiyxOwLAhBdTsC1YY8PQF+Wv/ShALwIRPrjyVl2x3zIyJ5aVveCNYV7k/6J1VcUgEIIIYSo2LlzHfph2ICeNe0CAvQOG3n4pnijGiHJbQN9J7/MTfiMbSYHQTk1LgCPB3mZuuW06hP1sLcjAxD7tMNQ5m2eAHNMzKp3qvFofAA21Jsd2owBh0yoAIq1RgZggd0sz14WgKdsqhtfd2s6fIE6VZLsviQAL9gOoa/MEQEYIvOqcvc2vKfnokM9d8oSlPOq8WTSMg/huj6efRyAE+6ye3CVOOVtlnVnE1yF6+o1BaAQQgghzk0uTRuAFm7SPEZQmd0U7mm3XDaAd45XEHMWT/Fgis48YCxzWxsXgJddrhtA7IqZEIAMG7MInTq5kQFodGl9CAHax18so6/D9iUQOmIrPj4AWQ4BG13/3wFsxwCtxJEBiAYtTsI1MfP1PwdgrMvdEJC/Uatsdj/Cp9U5DU/U4fULAjDS4vLX1HXavh0RgOh6Hd1mB4B+xDaGAvByizs6gHNal08mT2nNAZjt8rN/YKBJixNwfXJMd1uto/Y8ojUJ6B9JaoPVXgEhhBBCzPdI++dNjtwKIyhJJlqePfRNO3RqW2RJR98W2RqIAdBL5FatPzGNcQGIg1v+KtVsNqLebxCZ6zrctEYGIDaaZKLRtcmiep7RZq7dSTBRwPgAPBp8EogBL9vszLJjno4OwClyCcpHZv5zAOLAYr2UsXkTB9CibWBgkT34iiw/H4CqnPvMmdqoANyj2U0D72xu33UsOgtDAah+jInl9A3NTTyd3Kf5M73s8EZ7EoDHZBOe1Rx7d8Vt1gv+J4HcWTyzqPmrvQJCCCGEiO6v2aTT3NPwyFve+wLXdY1k4siAq857lyrQjhIka9cYH4CotEnmSnEo1bWc2ZzBmACEcbpF0m5W4Ynd2SSbnzA+ABmZqZNmKQVlskbS+lEYHYApmzNQvnDvmQDEdZtkohhVlWXewZcJHF2lFXpBAOLyw267HMbIANT36rQAvGuq3d9gRACiUiNpNj4BQ5NHFsn6vuYf8MX8Zf3PAraXvYta2iadz7Co+au9DkIIIYQIVSohvEDselLHOPrkdQzPiIdPAjP5Z+Zjh3MhBMavwxGMp4pHL0yngo87wDhRx8n7FbeKZ8XDc/cn8T9hjeHRP8VL73nTlRDGSX060aA8nQzNvZvFc2bDhRB8+ZPA8SiEEEIIIf4fUQH4cm9ZhKdlR/H3/Ej5/WlACCGEEEL8rQDUjHDCrEDJM4O/55SNCQBzy7yCEEIIIYT4awF4RrIMzzxn8PdoNdqNzha5VYEQQgghhPjv6VpxvNBuq32MgUg1j7/I2LdI83c6j9dCCCGEEEJcFjQI8V/twYEMAAAAwCB/63t8FQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAdwHGGnaxDMfFxwAAAABJRU5ErkJggg==" />
  ),
  category: "footer",
  attributes: {
    hidden: {
      type: "string|array",
      source: "attribute",
      selector: "select",
      attribute: "hidden",
      default: [],
    },
    contentUB: { type: "string", default: ` About ` },
    contentUA: { type: "string", default: ` Blog ` },
    contentt: { type: "string", default: ` Jobs ` },
    contentUC: { type: "string", default: ` Press ` },
    contentUD: { type: "string", default: ` Accessibility ` },
    contentUE: { type: "string", default: ` Partners ` },
    contentUF: { type: "string", default: `Facebook` },
    contentUG: { type: "string", default: `Instagram` },
    contentUH: { type: "string", default: `Twitter` },
    contentUI: { type: "string", default: `GitHub` },
    contentUJ: { type: "string", default: `Dribbble` },
    contentUK: {
      type: "string",
      default: `&copy; ${date} Workflow, Inc. All rights resercved.`,
    },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;
    const arData = repeaterData(props.attributes.hidden, true);

    return (
      <footer className="bg-white">
        <InspectorControls>
          <PanelBody title="Block settings">
            <PanelRow>
              <b>Navigation links</b>
            </PanelRow>
            <PanelRow>
              <RepeaterControl
                max={10}
                value={props.attributes.hidden}
                onChange={(val) => {
                  props.setAttributes({ hidden: val });
                }}
              >
                {(value, onChange) => {
                  return [
                    <TextControl
                      label="Label"
                      value={value.label}
                      onChange={(v) => {
                        value.label = v;
                        onChange(value);
                      }}
                    />,
                    <TextControl
                      label="URL"
                      value={value.url}
                      onChange={(v) => {
                        value.url = v;
                        onChange(value);
                      }}
                    />,
                  ];
                }}
              </RepeaterControl>
            </PanelRow>
          </PanelBody>
        </InspectorControls>

        <div className="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <nav className="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
            {arData.map((v) => {
              return (
                <div class="px-5 py-2">
                    <a className="text-base text-gray-500 hover:text-gray-900 py-2" href={v.url}>{v.label}</a>
                </div>
              )
            })}
            </nav>
          </div>
          <div className="mt-8 flex justify-center space-x-6 text-gray-400 hover:text-gray-500">
            <InnerBlocks
              allowedBlocks={["core/social-links"]}
              template={[["core/social-links"]]} templateLock="all"
            />
          </div>
          <p className="mt-8 text-center text-base text-gray-400">
            <RichText
              value={attributes.contentUK}
              onChange={(newtext) => setAttributes({ contentUK: newtext })}
            />
          </p>
      </footer>
    );
  },
  save: function (props) {
    const { attributes } = props;
    const arData = repeaterData(props.attributes.hidden, true);

    return (
      <footer class="bg-white">
        
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
          <nav className="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
            {arData.map((v) => {
                  return (
                    <div class="px-5 py-2">
                        <a class="text-base text-gray-500 hover:text-gray-900" href={v.url}>{v.label}</a>
                    </div>
                  )
                })}
            </nav>

            <div class="mt-8 flex justify-center space-x-6">
            
              <InnerBlocks.Content/>
            </div>
            <p class="mt-8 text-center text-base text-gray-400">
           <RichText.Content value={attributes.contentUK}/>
            </p>
        </div>
      </footer>
    );
  },
});
