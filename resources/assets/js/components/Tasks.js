import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import StatusButton from './statusToggle/StatusButton';

export default class Tasks extends Component {

    constructor() {
        super();
        //Initialize the state in the constructor
        this.state = {
            tasks: [],
        }
    }
    /*componentDidMount() is a lifecycle method
     * that gets called after the component is rendered
     */
    componentDidMount() {
        /* fetch API in action */
        fetch('/api/tasks')
            .then(response => {
                return response.json();
            })
            .then(tasks => {
                //Fetched product is stored in the state
                this.setState({ tasks });
                console.log(tasks);
            });
    }

    renderTasks() {
        return this.state.tasks.map(task => {
            let taskClassname = 'success';
            if(task.status_id === 2){
                taskClassname = 'success';
            } else if(task.status_id === 1) {
                taskClassname = 'warning';
            } else {
                taskClassname = 'danger';
            }

            let taskStatus = 'NOT done';

            if(task.status_id === 2){
                taskStatus = 'DONE';
            }

            return (

                <div>
                    <StatusButton/>{task.name} is {taskStatus} {taskClassname}
                {/*<div className={'card text-white mb-3 bg-' + apartmentclassname}>*/}
                    {/*<a href={"/apartments/"+apartment.id}><img src={""+ apartment.img_link} alt="" className={'card-img-top'}/></a>*/}
                    {/*<div key={apartment.id} className={'card-body'}>*/}
                        {/*/!*<div className={'row'}>*!/*/}
                        {/*/!*<div className={'col-lg-6'}>*!/*/}
                        {/*<h5 className={'card-title'}>{apartment.name}</h5>*/}
                        {/*/!*</div>*!/*/}
                        {/*/!*<div className={'col-lg-6'}>*!/*/}
                        {/*/!*</div>*!/*/}
                        {/*/!*</div>*!/*/}
                        {/*<p className={'card-text'}>{apartment.address}</p>*/}

                        {/*<div className={'card-footer'}>*/}
                            {/*<small className={'text-white'}>{apartmentStatus} for checkIn.</small>*/}
                        {/*</div>*/}
                        {/*<a className={'card-link d-flex justify-content-end'} href={"/form/create/"+apartment.id}>*/}
                            {/*<button className={'btn btn-block btn-secondary btn-sm'}>*/}
                                {/*/!*<i class="fas fa-address-card"></i>*!/*/}
                                {/*Guest Form*/}
                            {/*</button>*/}
                        {/*</a>*/}
                        {/*/!*{apartment.status_id}*!/*/}
                        {/*/!*<StatusButton/>*!/*/}
                        {/*/!*<div className={'btn ' + apartmentclassname} onClick={''}>{ apartment.name} </div>*!/*/}
                    {/*</div>*/}
                {/*</div>*/}
                </div>


            );
        })
    }

    render() {
        return (
            <div className={'container'}>
                <h2 className={'m-4 text-center'}>All Tasks</h2>

                <div className={'card-deck'}>
                    { this.renderTasks() }
                </div>
            </div>

        );
    }
}

ReactDOM.render(<StatusButton />, document.getElementById('app'));
