import React, { Component } from 'react';
import ButtonToolbar from 'react-bootstrap/lib/ButtonToolbar';
import Button from 'react-bootstrap/lib/Button';
import Modal from 'react-bootstrap/lib/Modal';
import FormGroup from 'react-bootstrap/lib/FormGroup';
import FormControl from 'react-bootstrap/lib/FormControl';
import ControlLabel from 'react-bootstrap/lib/ControlLabel';
import Checkbox from 'react-bootstrap/lib/Checkbox';

class EditDialog extends Component{

   constructor(props) {
        super(props);

        this.state = {
          model: null,
          changedValues: {},
          editSaveButtonText: 'Save',
          editCancelButtonText: 'Cancel'
        };
    }

  close() {
    if (this.props.onClose !== undefined) {
      this.props.onClose();
    }
  }

  open() {
    if (this.props.onOpen !== undefined) {
      this.props.onOpen();
    }
  }

  submitForm (e) {
    e.preventDefault();

    if (this.props.onSubmit !== undefined) {
      this.props.onSubmit(this.state.changedValues);
    }

    this.setState({ changedValues: {} });
  }

  componentWillReceiveProps (nextProps) {
    var model = nextProps.item;

    if (model !== null) {
      this.setState({ model: model });
    } else {
      this.setState({ model: null });
    }

  }

  handleItemChange (e) {
    const changedValues = this.state.changedValues;

    if(e.target !== null && e.target !== undefined) {
      changedValues[e.target.id] = e.target.value;

      this.setState({ changedValues, });
    }

  }

  setSelectItem (id, value ) {
     const changedValues = this.state.changedValues;
     changedValues[id] = value;

    this.setState({ changedValues, });

  }

  handleCheckBoxChange (e) {
    var checked = e.target.checked;
    const changedValues = this.state.changedValues;

    changedValues[e.target.id] = checked ? 1 : 0;

    this.setState({ changedValues, });  
  }

  buildFormControl (layout) {
    var result = '',
        checked = '',
        options = [];

    if (layout !== undefined && layout !== null) {
      
      switch(layout.type) {

        case 'text':
          result = (
                  <FormGroup
                    key = {layout.key}
                    controlId={layout.key}>
                    <ControlLabel>{layout.editLabel}</ControlLabel>
                    <FormControl
                      type= 'text'
                      defaultValue={this.state.model !== null ? this.state.model.get(layout.key) : layout.defaultValue}
                      placeholder={layout.placeholderText}
                      onChange={ item => this.handleItemChange(item)}
                      />
                  </FormGroup>
                );
          break;

        case 'checkbox':
          if( this.state.model !== null && this.state.model.get(layout.key) === 1) {
            checked = 'checked'
          } else {
             checked = layout.defaultValue;
          }
          
          result = (
              <Checkbox 
                key = {layout.key}    
                id = {layout.key}      
                defaultChecked = {checked}                  
                onChange={item => this.handleCheckBoxChange(item) }>
                  {layout.editLabel}
              </Checkbox>
          );
          break;

          case 'textarea':
             result = (
                  <FormGroup
                    key = {layout.key}
                    controlId={layout.key}>
                    <ControlLabel>{layout.editLabel}</ControlLabel>
                    <FormControl
                      componentClass="textarea"
                      defaultValue={this.state.model !== null ? this.state.model.get(layout.key) : layout.defaultValue}
                      placeholder={layout.placeholderText}
                      onChange={item => this.handleItemChange(item)}
                      />
                  </FormGroup>
                );
          break;

          case 'select':
            
            if( this.props.selectOptions !== null) {
              
                options = this.props.selectOptions[layout.key];
            }

            if(options === undefined || options === null){

              options = [];

            } 

            result = (
              <FormGroup
                    key = {layout.key}
                    controlId={layout.key}>
                    <ControlLabel>{layout.editLabel}</ControlLabel>
                    <FormControl
                      componentClass="select"                                             
                      defaultValue={this.state.model !== null ? this.state.model.get(layout.key) : "none"}
                      onChange={item => this.handleItemChange(item)}                                    
                      >
                      <option value="none" disabled>{layout.placeholderText}</option>

                      {options.map(function (item) {
                          return (
                              <option 
                              key = {item.value}
                              value = { item.value }>
                                { item.label }
                              </option>
                          );
                      }) }

                      </FormControl>
              </FormGroup>
            );
          break;

        default:
          result = 'Unknown control type';

      }
    }
    
    return result;
  }

  render () {
    var layoutItems = [];

    if (this.props.layoutItems !== undefined && this.props.layoutItems !== null) {
      layoutItems = this.props.layoutItems;
    }

    return (
      <div>
        <Modal show={this.props.showAddModal} onHide={() => this.close() }>
          <Modal.Header closeButton>
            <Modal.Title>{this.props.title}</Modal.Title>
          </Modal.Header>
          <form onSubmit={item => this.submitForm(item)}>
            <Modal.Body>

              { layoutItems.map(item => this.buildFormControl(item)) }

            </Modal.Body>
            <EditDialogFooter
              saveButtonText = {this.state.editSaveButtonText}
              cancelButtonText = {this.state.editCancelButtonText}
              onCancel = {() => this.close() }
              />
          </form>
        </Modal>
      </div>
    );
  }
}

class EditDialogFooter extends Component{

  cancel() {
    if (this.props.onCancel !== undefined) {
      this.props.onCancel();
    }
  }

  render () {

    return (
      <Modal.Footer>
        <ButtonToolbar>
          <Button bsStyle = 'success' type='submit'>{this.props.saveButtonText}</Button>
          <Button bsStyle = 'danger' onClick={ () => this.cancel() }>{this.props.cancelButtonText}</Button>
        </ButtonToolbar>
      </Modal.Footer>
    );
  }
}
export default EditDialog;