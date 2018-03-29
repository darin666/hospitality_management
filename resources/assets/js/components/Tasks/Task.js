import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import StatusButton from "./statusToggle/StatusButton";

export default class Task extends Component {
    constructor(props){
        super(props);

        this.state = {
            loaded: false,
            currentTaskStatus: 0
        }
    }

    componentWillMount(){
        this.props.fetchTasks();
    }

    render() {
        let status = 0;

        return (
            <div className={'d-flex justify-content-between'} onClick={this.UpdateTask}>
                {this.props.name}
                <StatusButton/>
            </div>
        );
    }
    UpdateTask() {
        fetch( '/api/api/tasks/' + this.props.mykey, {
            method:'put',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(this.props.mytask)
        })
            .then(response => {
                return response.json();
            })
            .then( data => {
                /* Updating the state */
                var array = this.props.tasks.filter(function(item) {
                    return item !== currentTask
                })
                this.setState((prevState)=> ({
                    tasks: array.concat(task),
                    currentTask : task
                }))
            })
    }
}