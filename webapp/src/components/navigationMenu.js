import React, { Component } from 'react';
import Nav from 'react-bootstrap/lib/Nav';
import ConfigContainer from './configContainer';
import NavItem from 'react-bootstrap/lib/NavItem';

class NavigationMenu extends Component {

    constructor(props) {
        super(props);

        this.state = {};
        this.handleSelect = this.handleSelect.bind(this);
    }

    getInitialState () {
        return {
            activeKey: null
        }
    }

    handleSelect (selectedKey) {
        this.setState({ activeKey: selectedKey });
    }

    getCurrentData (selectedKey) {
        var navItems = this.props.navItems;

        if (navItems !== undefined && navItems !== null) {
            for (var i = 0; i < navItems.length; i++) {
                if (navItems[i].eventKey === selectedKey) {
                    return navItems[i].model;
                }
            }
        }

        return null;
    }

    componentWillReceiveProps (nextProps) {
        if (nextProps.tabContent !== null) {
            this.tabContent = nextProps.tabContent;
        }
    }

    componentWillMount () {
        var navItems = this.props.navItems;

        if (navItems !== undefined && navItems !== null && navItems.length > 0) {
            
            for (var i = 0; i < navItems.length; i++) {
               navItems[i].model.fetch({async:false});
            }
        }
    }

    render () {
       

        return (
            <div>
                <Nav bsStyle="pills" activeKey={ this.state.activeKey == null ? 
                                                this.props.defaultNavItem : 
                                                this.state.activeKey } 
                                    onSelect={ this.handleSelect }>

                    {this.props.navItems.map(function (item) {
                        return (
                            <NavItem key={item.eventKey} eventKey={item.eventKey} title={item.title}>{item.label}</NavItem>
                        );
                    }) }
                </Nav>
                <ConfigContainer 
                    data = { this.getCurrentData(this.props.defaultNavItem) }
                />
            </div>
        );
    }
}

export default NavigationMenu;