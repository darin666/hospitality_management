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
            let apartmentclassname = 'success';
            if(apartment.status_id == 2){
                apartmentclassname = 'success';
            } else if(apartment.status_id == 1) {
                apartmentclassname = 'warning';
            } else {
                apartmentclassname = 'danger';
            }

            let apartmentStatus = 'NOT ready';

            if(apartment.status_id == 2){
                apartmentStatus = 'ready';
            }

            return (

                <div className={'card text-white mb-3 bg-' + apartmentclassname}>
                    <img src={""+ apartment.img_link} alt="" className={'card-img-top'}/>
                    <div key={apartment.id} className={'card-body'}>
                        <h5 className={'card-title'}>{apartment.name}</h5>
                        <p className={'card-text'}>{apartment.address}</p>
                        <div className={'card-footer'}>
                            <small className={'text-white'}>Is {apartmentStatus} for checkIn.</small>
                        </div>
                        {/*{apartment.status_id}*/}
                        {/*<StatusButton/>*/}
                        {/*<div className={'btn ' + apartmentclassname} onClick={''}>{ apartment.name} </div>*/}
                    </div>

                </div>
                );
        })
    }

    render() {
        return (
            <div className={'container'}>
                <h2>All Apartments</h2>
                <div className={'card-deck'}>
                 { this.renderApartments() }
                </div>
            </div>

        );
    }
}

ReactDOM.render(<StatusButton />, document.getElementById('app'));
