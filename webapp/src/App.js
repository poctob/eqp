import React, { Component } from 'react';
import Config from './collections/configCollection';
import Category from './collections/categoryCollection';
import Status from './collections/statusCollection';
import Equipment from './collections/equipmentCollection';
import NavigationMenu from './components/navigationMenu';
import logo from './logo.svg';
import './App.css';

class App extends Component {

  constructor(props) {
    super(props);

    this.state = {
      configCollection: new Config(),
      categoryCollection: new Category(),
      statusCollection: new Status(),
      equipmentCollection: new Equipment(),
      selectedNavItem: 'General',
      navItems: []
    };

    this.state.navItems.push({
      eventKey: 'Equipment',
      title: 'Equipment',
      label: 'Equipment',
      model: this.state.equipmentCollection
    });

    this.state.navItems.push({
      eventKey: 'Categories',
      title: 'Categories',
      label: 'Categories',
      model: this.state.categoryCollection
    });

    this.state.navItems.push({
      eventKey: 'Status',
      title: 'Status',
      label: 'Status',
      model: this.state.statusCollection
    });

    this.state.navItems.push({
      eventKey: 'General',
      title: 'General',
      label: 'General',
      model: this.state.configCollection
    });
  }

  componentWillMount() {
    const equipmentCollection = this.state.equipmentCollection;

    equipmentCollection.statusCollection = this.state.statusCollection;
    equipmentCollection.categoryCollection = this.state.categoryCollection; 

    this.setState({ equipmentCollection, });

  }

  onMenuChange(selection) {
    this.setState({selectedNavItem: selection});
  };

  render() {
    return (
      <div className="App">
       <NavigationMenu
          navItems = { this.state.navItems }
          defaultNavItem = 'General'
          onChangeCallBack = { item => this.onMenuChange(item) }
        />
        </div> 
    );
  }
}

export default App;

 
   





