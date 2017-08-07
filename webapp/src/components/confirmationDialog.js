import React, { Component } from 'react';
import ButtonToolbar from 'react-bootstrap/lib/ButtonToolbar';
import Button from 'react-bootstrap/lib/Button';
import Modal from 'react-bootstrap/lib/Modal';

class ConfirmationDialog extends Component{

  constructor(props) {
    super(props);
    this.state = { confirmed: false  };
  }

  close() {
    if( this.props.onClose !== undefined) {
        this.props.onClose();
    }  
  }

  open() {
    if( this.props.onOpen !== undefined) {
        this.props.onOpen();
     }       
  }

  setYes() {    
    this.setState({ confirmed: true});
    if( this.props.onConfirm !== undefined) {
        this.props.onConfirm();
    } 
  }

  setNo(e) {
    this.setState({ confirmed: false});
    if( this.props.onDeny !== undefined) {
        this.props.onDeny();
    } 
  }

  render() {

    return(
      <div>
        <Modal show={this.props.show} onHide={ () => this.close() }>
            <Modal.Header closeButton>
              <Modal.Title>{this.props.title}</Modal.Title>
            </Modal.Header>
           
              <Modal.Body>
               {this.props.text}
              </Modal.Body>
              <Modal.Footer>
                <ButtonToolbar>
                  <Button bsStyle = 'success' onClick={ () => this.setYes() }>{this.props.yesButtonText}</Button>
                  <Button bsStyle = 'danger' onClick={ () => this.setNo() }>{this.props.noButtonText}</Button>
                </ButtonToolbar>
              </Modal.Footer>            
          </Modal>
      </div>
    );
  }
}

export default ConfirmationDialog;