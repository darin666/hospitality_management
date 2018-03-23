import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import StatusButton from './statusToggle/StatusButton';

export default class Apartments extends Component {

    constructor() {
        super();
        //Initialize the state in the constructor
        this.state = {
            apartments: [],
        }
    }
    /*componentDidMount() is a lifecycle method
     * that gets called after the component is rendered
     */
    componentDidMount() {
        /* fetch API in action */
        fetch('/apartments')
            .then(response => {
                return response.json();
            })
            .then(apartments => {
                //Fetched product is stored in the state
                this.setState({ apartments });
            });
    }

    renderApartments() {
        return this.state.apartments.map(apartment => {
            return (
                /* When using list you need to specify a key
                 * attribute that is unique for each list item
                */
                <li key={apartment.id} >
                    <StatusButton/> <div className={'btn btn-primary'}>{ apartment.name }</div>
                </li>
            );
        })
    }

    render() {
        return (
            <div>
                <h2>All Apartments</h2>
                <ul>
                 { this.renderApartments() }
                </ul>
            </div>

        );
    }
}

ReactDOM.render(<StatusButton />, document.getElementById('app'));
