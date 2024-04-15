const { Button, MenuGroup, MenuItem, SelectControl, TextControl } = wp.components;
const { Component } = wp.element;
 
export class SearchPostsControl extends Component {
    constructor(props) {
        super(props);
        this.state = {
            selectedButtons: [],
            resultObjects: [],
            resultButtons: []
        };
        this.buildResultButtons = this.buildResultButtons.bind(this);
        this.buildSelectedButtons = this.buildSelectedButtons.bind(this);
        this.changePostType = this.changePostType.bind(this);
        this.getStartingData = this.getStartingData.bind(this);
        this.updateSelectedIds = this.updateSelectedIds.bind(this);
        this.searchFor = this.searchFor.bind(this);
    }

    componentDidMount() {
        this.getStartingData();
    }
 
    buildResultButtons() {
        let { setAttributes } = this.props;
        const objects = this.state.resultObjects;
        let resultButtons = objects.map(function(item, ind) {
            let isChecked = item.checked;
                                    let toCheck = true;
            if(isChecked == true) {
                toCheck = false;
            }
            return(
                <MenuItem id={ item.id } data-ischecked={ isChecked } onClick={ () => {
                        this.updateSelectedIds(item.id, toCheck)
                    } 
                }
                >
                    { item.title.rendered }
                </MenuItem>
            );
        }, this);
                let timeNow = Date.now();
        this.setState({ resultButtons: resultButtons }, setAttributes({ updated: timeNow }));
    }

    buildSelectedButtons() {
		let { attributes: { postIds, postType }, setAttributes } = this.props;
				if(postIds.length > 0) {
			let selectionButtons = [];
						let path = '/wp/v2/' + postType + '?_embed&include=' + postIds;
			wp.apiFetch({ path: path })
				.then( (posts) => {
					selectionButtons = postIds.map((item) => {
												let match;
						for(let i=0; i < posts.length; i++) {
							if(posts[i].id == item) {
								match = i;
								break;
							}
						}
						if(match >= 0) {
							return(
								<Button
									isDefault
									isDestructive
									onClick={ () => this.updateSelectedIds(item, false) }
								>
									{ posts[match].title.rendered }
								</Button>
							);
						} else {
														let idIndex = postIds.indexOf(item);
							postIds.splice(idIndex, 1);
							setAttributes({ postIds, postIds });
							return(
								<p>A previously selected item was removed because it no longer exists.</p>
							);
						}
					})
				})
				.catch( (error) => {
					console.log('Related Posts error',error);
				})
				.then(() =>
					this.setState({ selectedButtons: selectionButtons })
				);
		}
				else {
			this.setState({ selectedButtons: <p>None selected</p> });
		}
	}

    changePostType(newType) {
                let { setAttributes } = this.props;
        setAttributes({ postType: newType });
                this.setState({ resultObjects: [], resultButtons: []}, this.searchFor(newType));
    }
 
    getStartingData() {
        this.searchFor('');
    }
 
    searchFor(searchPostType = '', keyword = '') {
        let { attributes: { postType } } = this.props;
        let finalPostType = postType;
                if(searchPostType != '') {
            finalPostType = searchPostType;
        }
                let currentId = wp.data.select('core/editor').getCurrentPostId();
        let path;
        if(keyword != '') {
            path = '/wp/v2/' + finalPostType + '?_embed&search=' + keyword + '&exclude=' + currentId;
 
        } else {
            path = '/wp/v2/' + finalPostType + '?_embed&exclude=' + currentId;
        }
        wp.apiFetch( { path } ).then( ( posts ) => {
            this.setState({ resultObjects: posts }, () => this.buildResultButtons());
        })
        .catch( (error) => {
                        console.log('There was an error in the Related Posts block while searching for posts.',error);
        })
    }
 
    updateSelectedIds(id, val) {
        let { attributes: { postIds }, setAttributes } = this.props;
        let stateSelected = postIds;
                if(val == true) {
            stateSelected.push(id);
        } else {
            let idIndex = stateSelected.indexOf(id);
            stateSelected.splice(idIndex, 1);
        }
                let posts = this.state.resultObjects;
        for(var i = 0; i < posts.length; i++) {
                        posts[i].checked = false;
            for(var j = 0; j < stateSelected.length; j++) {
                if(posts[i].id === stateSelected[j]) {
                    posts[i].checked = true;
                    break;
                }
            }
        }
                this.setState({ resultObjects: posts }, function() {
            this.buildSelectedButtons();
            this.buildResultButtons();
        });

        setAttributes({ posts, posts });

        
    }
 
    render() {
        let { attributes: { postType } } = this.props;
				let displayType = postType;
		if(postType != 'posts' && postType != 'faculty') {
			displayType += 's';
		}
		let label = 'Search for ' + displayType + ' to display';
        return(
            <div className='search-posts-control'>
                <div className='posts-selected hidden'>
                    <h2>Currently selected:</h2>
                    <SelectControl
                        hidden 
                        label='Post Type'
                        value={ postType }
                        options={ [
                            { label: 'Post', value: 'posts' },
                        ] }
                        onChange={ (val) => { this.changePostType(val) } }
                    />
                    { this.state.selectedButtons }
                </div>
                <div className='posts-search'>
                    <TextControl
                        label={ label }
                        type='search'
                        onChange={ (val) => this.searchFor('', val) }
                    />
                    <MenuGroup label='Search Results' className='posts-list' >
                        { this.state.resultButtons }
                    </MenuGroup>
                </div>
            </div>
        );
    }
}