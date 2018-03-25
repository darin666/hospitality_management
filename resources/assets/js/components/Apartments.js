import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import StatusButton from './statusToggle/StatusButton';
import NavComponent from'./NavComponent';

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
        fetch('/api/apartments')
            .then(response => {
                return response.json();
            })
            .then(apartments => {
                //Fetched product is stored in the state
                this.setState({ apartments });
                console.log(apartments);
            });
    }

    renderApartments() {
        return this.state.apartments.map(apartment => {
            let apartmentclassname = 'btn-success';
            if(apartment.status_id == 2){
                apartmentclassname = 'btn-success';
            } else if(apartment.status_id == 1) {
                apartmentclassname = 'btn-warning';
            } else {
                apartmentclassname = 'btn-danger';
            }

            return (

                <div>
                    <div key={apartment.id} className={'d-flex'}>
                        {/*{apartment.status_id}*/}
                        {/*<StatusButton/>*/}
                        <div className={'btn ' + apartmentclassname} onClick={''}>{ apartment.name} </div>
                    </div>

                </div>
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
