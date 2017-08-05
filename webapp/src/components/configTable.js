import React, { Component } from 'react';
import Table from 'react-bootstrap/lib/Table';
import ButtonToolbar from 'react-bootstrap/lib/ButtonToolbar';
import Button from 'react-bootstrap/lib/Button';

class ConfigTable extends Component {
    render () {
        return (
            <Table striped>
                <ConfigTableHeader
                    headers = {this.props.data !== null ? this.props.data.headers : null}
                    />
                <ConfigTableList {...this.props}/>
            </Table>
        );
    }
}

class ConfigTableHeader extends Component{
    render () {
        var headers = [],
            key = 0;

        if (this.props.headers !== undefined && this.props.headers !== null) {
            headers = this.props.headers;
        }

        return (
            <thead>
                <tr>

                    {headers.map(function (item) {
                        return (
                            <ConfigTableHeaderTh
                                key = { key++ }
                                item = {item} />
                        );
                    }) }

                </tr>
            </thead>
        );
    }
}

class ConfigTableHeaderTh extends Component{
    render () {
        return (
            <th>{this.props.item}</th>
        );
    }
}

class ConfigTableList extends Component{
    render () {
        var rows = [];

        if (this.props.data !== null) {
            this.props.data.models.forEach(function (item) {
                rows.push(<ConfigTable.Row
                    item={item}
                    key={item.cid}
                    handleDelete={this.props.handleDelete}
                    handleEdit={this.props.handleEdit}
                    />);
            }, this);
        }

        return (
            <tbody>{rows}</tbody>
        );
    }
}

class ConfigTableRow extends Component {
    getInitialState () {
        return {
            editButtonText: 'Edit',
            deleteButtonText: 'Delete'
        }
    }

    deleteItem () {
        if (this.props.handleDelete !== undefined) {
            this.props.handleDelete(this.props.item);
        }
    }

    editItem () {
        if (this.props.handleEdit !== undefined) {
            this.props.handleEdit(this.props.item);
        }
    }

    render () {
        var itemProperties = this.props.item.getProperties(),
            key = 0;

        return (
            <tr>
                {itemProperties.map(function (item) {
                    return (
                        <ConfigTable.Row.Td
                            key = { key++ }
                            item = {item} />
                    );
                }) }
                <td>
                    <ButtonToolbar>
                        <Button bsStyle="warning" onClick={this.editItem}>
                            <span className="glyphicon glyphicon-pencil" aria-hidden="true"></span> {this.state.editButtonText}
                        </Button>
                        <Button bsStyle="danger" onClick={this.deleteItem}>
                            <span className="glyphicon glyphicon-remove" aria-hidden="true"></span> {this.state.deleteButtonText}
                        </Button>
                    </ButtonToolbar>
                </td>
            </tr>
        );
    }
}

class ConfigTableRowId extends Component {
    render () {
        return (
            <td>{this.props.item}</td>
        );
    }
}

export default ConfigTable;