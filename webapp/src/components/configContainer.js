import React, { Component } from 'react';
import Button from 'react-bootstrap/lib/Button';
import Spinner from 'react-spinkit';
import ConfigTable from './configTable';
import ConfirmationDialog from './confirmationDialog';
import EditDialog from './editDialog';

class ConfigContainer extends Component {

  constructor(props) {
    super(props);

    this.state = {
      title: 'General Configuration',
      newButtonText: 'Add',
      showAddModal: false,
      addModalTitle: 'Add new item',
      confirmationTitle: 'Confirm Delete',
      confirmationText: 'Are You Sure You Want to Delete This Item?',
      showConfirmationDialog: false,
      deleteYesButtonText: 'Yes, Do It Now!',
      deleteNoButtonText: 'No, I Changed My Mind...',
      deleteCandidate: null,
      editCandidate: null,
      loading: false
    };

    this.onAddItemFormSubmit = this.onAddItemFormSubmit.bind(this);
  }

  onAddItemFormSubmit(changedProperties) {
    this.onAddModalClose();
    this.setState({ loading: true });

    if (this.state.editCandidate !== null) {
      this.state.editCandidate.save(
        changedProperties,
        { success: this.onSync });
      this.setState({ editCandidate: null });
    } else { 
      this.props.data.create(changedProperties, {
        wait: true,
        success: this.onSync
      });
    }
  }

  onSync() {

    if (typeof this.props.data.populateReferences === "function") { 
      this.props.data.populateReferences();
    }

    this.setState({ loading: false });
  }

  handleNew(model) {
    this.setState({ editCandidate: null });
    this.openAddModal();
  }

  handleDelete(model) {
    this.setState({ deleteCandidate: model });
    this.openDeleteConfirm();
  }

  handleEdit(model) {
    this.setState({ editCandidate: model });
    this.openAddModal();
  }

  onAddModalClose() {
    this.setState({ showAddModal: false });
  }

  openAddModal() {
    this.setState({ showAddModal: true });
  }

  onDeleteConfirmClose() {
    this.setState({ showConfirmationDialog: false });
  }

  openDeleteConfirm() {
    this.setState({ showConfirmationDialog: true });
  }

  onDeleteConfirm() {
    this.onDeleteConfirmClose();

    if (this.state.deleteCandidate !== null) {
      this.state.deleteCandidate.destroy({ success: this.onSync });
      this.setState({ deleteCandidate: null });
    }
  }

  componentWillReceiveProps(nextProp) {
    this.syncData( nextProp.data );
  }

  syncData (model) {
    model.on('sync', this.onSync);
    model.fetch();
  }

  render () {
    return (

      <div>
        <div className = {this.state.loading ? '' : 'hidden'}>
          <Spinner spinnerName='three-bounce' />
        </div>

        <div className = {this.state.loading ? 'disabledContainer' : ''}>

          <div className='page-header'>{this.state.title}</div>
          <Button bsStyle="primary" onClick={ () => this.handleNew() }>
            <span className="glyphicon glyphicon-plus" aria-hidden="true"></span> {this.state.newButtonText}
          </Button>

          <ConfigTable
            data = {this.props.data !== undefined ? this.props.data : null}
            handleDelete = { () => this.handleDelete() }
            handleEdit = { () => this.handleEdit() }
            />

          <ConfirmationDialog
            title={this.state.confirmationTitle}
            text={this.state.confirmationText}
            show={this.state.showConfirmationDialog}
            onClose = {this.onDeleteConfirmClose}
            onConfirm = {this.onDeleteConfirm}
            onDeny = {this.onDeleteConfirmClose}
            yesButtonText = {this.state.deleteYesButtonText}
            noButtonText = {this.state.deleteNoButtonText}
            />

          <EditDialog
            showAddModal = {this.state.showAddModal}
            title = {this.state.addModalTitle}
            onClose ={() => this.onAddModalClose() }
            onSubmit = {this.onAddItemFormSubmit}
            item = {this.state.editCandidate}
            layoutItems = {this.props.data.layoutItems}
            selectOptions = {this.props.data.selectOptions}
            />

        </div>
      </div>
    );
  }

}

export default ConfigContainer;