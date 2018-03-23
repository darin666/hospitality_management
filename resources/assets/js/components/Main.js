import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Main extends Component {

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
        console.log('asd');
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
                <li key={apartment.id} className={'btn btn-primary'}>
                    { apartment.name }
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