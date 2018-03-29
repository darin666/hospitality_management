import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import StatusButton from '../Tasks/statusToggle/StatusButton';

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

            if(apartment.status_id === 2){
                apartmentclassname = 'success';
            } else if(apartment.status_id === 1) {
                apartmentclassname = 'warning';
            }else if(apartment.status_id === 3) {
                apartmentclassname = 'secondary';
            } else {
                apartmentclassname = 'danger';
            }

            let apartmentStatus = 'NOT READY';

            if(apartment.status_id === 2){
                apartmentStatus = 'READY';
            }else if(apartment.status_id === 3){
                apartmentStatus = 'OCCUPIED'
            }

            return (

                <div key={apartment.id} className={'card text-white mb-3 bg-' + apartmentclassname}>
                    <a href={"/apartments/"+apartment.id}><img src={""+ apartment.img_link} alt="" className={'card-img-top'}/></a>
                    <div key={apartment.id} className={'card-body'}>
                        {/*<div className={'row'}>*/}
                        {/*<div className={'col-lg-6'}>*/}
                        <h5 className={'card-title'}>{apartment.name}</h5>
                        {/*</div>*/}
                        {/*<div className={'col-lg-6'}>*/}
                        {/*</div>*/}
                        {/*</div>*/}
                        <p className={'card-text'}>{apartment.address}</p>

                        <div className={'card-footer'}>
                            <small className={'text-white'}>{apartmentStatus}</small>
                        </div>
                        <a className={'card-link d-flex justify-content-end'} href={"/form/create/"+apartment.id}>
                            <button className={'btn btn-block btn-secondary btn-sm'}>
                                {/*<i class="fas fa-address-card"></i>*/}
                                Guest Form <i className="fas fa-address-card"></i>
                            </button>
                        </a>
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
                <h2 className={'m-4 text-center'}>All Apartments</h2>

                <div className={'card-deck'}>
                 { this.renderApartments() }
                </div>
            </div>

        );
    }
}

ReactDOM.render(<StatusButton />, document.getElementById('app'));
