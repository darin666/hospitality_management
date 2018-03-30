import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import StatusButton from "./statusToggle/StatusButton";

export default class Task extends Component {
    constructor(props){
        super(props);
        console.log(this.props.mytask.status_id);
        this.state = {
            currentTaskStatus: this.props.mytask.status_id,
            mykey: this.props.mykey,
            currentTask: this.props.currentTask
        }
    }

    // componentWillMount(){
    //     this.props.fetchTasks();
    // }

    handleClickButton(value){
        this.setState({currentTaskStatus:value});
        console.log('value:',value);
        this.UpdateTask(value);
    }

    render() {
        let styling = 'text-danger';
        if (this.state.currentTaskStatus===1){
            styling = 'text-secondary';
        }

        return (
            <div className={'d-flex justify-content-between '+ styling}>
                <div className={'ml-5'}>
                    {this.props.name}
                </div>
                <div>
                <StatusButton
                    status = {this.state.currentTaskStatus}
                    handleClickButton = {this.handleClickButton.bind(this)}/>
                </div>
            </div>
        );
    }

    UpdateTask(value) {
        console.log(this);
        console.log('status :', this.state.currentTaskStatus)
        fetch( '/api/tasks/' + this.props.mykey, {
            method:'put',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({status_id: value})
        })
            .then(response => {
                return response.json();
            })
            .then( data => {

            })
    }
}