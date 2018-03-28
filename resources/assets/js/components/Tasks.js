import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import StatusButton from './statusToggle/StatusButton';

export default class Tasks extends Component {

    constructor(props) {
        super(props);
        //Initialize the state in the constructor
        this.state = {
            tasks: [],
            currentTask: null,
            currentTaskStatus:null
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
            // let taskDisplay = '';
            //
            // if(task.user_id !== 1){
            //     taskDisplay = 'd-none';
            // }

            let taskClassname = 'cross';
            if(task.status_id === 1){
                taskClassname = 'check';
            } else {
                taskClassname = 'cross';
            }

            let taskStatus = 'NOT done';

            if(task.status_id === 1){
                taskStatus = 'DONE';
            }

            return (
                //this.handleClick() method is invoked onClick.
                <div key={task.id} className={'ml-2 d-flex justify-content-between'}>
                    {task.name} is {taskStatus} <div onClick={()=> this.handleClick(task)} key={task.id} className={'statusbutton '+ taskClassname}></div>
                </div>


            );
        })
    }

    handleClick(task) {
        //used to set the state
        this.setState({currentTask: task, currentTaskStatus:task.status_id});
        if (this.state.currentTaskStatus === 0){
            this.state.currentTaskStatus = 1;
        } else {
            this.state.currentTaskStatus = 0;
            console.log(this.state.currentTaskStatus);
        }
        return this.state.currentTaskStatus;
    }




    render() {
        return (
            <div className={'container'}>
                <h2 className={'m-4 text-center'}>My Tasks</h2>

                <div>
                    { this.renderTasks() }
                </div>


            </div>

        );
    }
}



ReactDOM.render(<StatusButton />, document.getElementById('app'));
