import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import StatusButton from './statusToggle/StatusButton';
import Task from './Task';
import AddTask from './AddTask';
export default class Tasks extends Component {

    constructor(props) {
        super(props);
        //Initialize the state in the constructor
        this.state = {
            tasks: [],
            currentTask: 1,
        };

        this.handleAddTask = this.handleAddTask.bind(this);
    }
    /*componentDidMount() is a lifecycle method
     * that gets called after the component is rendered
     */

    setCurrentTask(task_id){
        this.setState({currentTask: task_id});
    }

    componentDidMount() {
        /* fetch API in action */
       this.fetchTasks();
    }

    fetchTasks() {
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

        return this.state.tasks.map(
            (task) => {
            // let taskDisplay = '';
            //
            // if(task.user_id !== 1){
            //     taskDisplay = 'd-none';
            // }

            // let taskClassname = 'cross';
            // if(task.status_id === 1){
            //     taskClassname = 'check';
            // } else {
            //     taskClassname = 'cross';
            // }
            //
            // let taskStatus = 'NOT done';
            //
            // if(task.status_id === 1){
            //     taskStatus = 'DONE';
            // }

            return (
                <div>

                <Task
                    // updateTask = {this.handleUpdate(task)}
                    tasks = {this.state.tasks}
                    mytask = {task}
                    setCurrentTask = {this.setCurrentTask.bind(this)}
                    fetchTasks={this.fetchTasks.bind(this)}
                    name={task.name}
                    description={task.description}
                    mykey={task.id}
                />
                {/*<StatusButton/>*/}
                {/*this.handleClick() method is invoked onClick.*/}

                {/*<div task_key={task.id} key={task.id} className={'ml-2 d-flex justify-content-between'}>*/}
                    {/*{task.name} is {taskStatus} <div onClick={()=> this.handleClick(task)} key={task.id} className={'statusbutton '+ taskClassname}></div>*/}

                {/*<UpdateTask onUpdate={this.handleUpdate.bind(this)} mytask = {task}/>*/}
                {/*</div>*/}
                </div>

            );
        })
    }

        //used to set the state
    handleClick(task) {
        this.setState({currentTask: task, currentTaskStatus:task.status_id});
        if (this.state.currentTaskStatus === 0){
            this.state.currentTaskStatus = 1;
        } else {
            this.state.currentTaskStatus = 0;
            console.log(this.state.currentTaskStatus);
        }
        return this.state.currentTaskStatus;
    }

    handleAddTask(task) {
        /*Fetch API for post request */
        fetch( '/api/tasks', {
            method:'post',
            /* headers are important*/
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(task)
        })
            .then(response => {
                return response.json();
            })
            .then( data => {
                //update the state of tasks and currentTask
                this.setState((prevState)=> ({
                    tasks: prevState.tasks.concat(data),
                    currentTask : data
                }))
            })

    }

    handleUpdate(task) {

        console.log(task);
        fetch( '/api/tasks/' + task.id, {
            method:'put',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(task)
        })
            .then(response => {
                return response.json();
            })
            .then( data => {
                /* Updating the state */
                var array = this.state.tasks.filter(function(item) {
                    return item !== task
                })
                this.setState((prevState)=> ({
                    tasks: array.concat(task),
                    currentTask : task
                }))
            })
    }

    render() {

        let mytask = this.state.tasks.find(task=>task.id == this.state.currentTask)

        // if(!this.state.loaded)
        //     return (
        //         <div className="container">
        //             <h1>Please wait a moment...</h1>;
        //         </div>
        //     );

        // return (
        //     <div className="container">
        //         <h2>My Tasks</h2>
        //         <div>
        //             <Tasks setCurrentTask={this.setCurrentTask.bind(this)} fetchTasks={this.fetchTasks.bind(this)} tasks={this.state.tasks}/>
        //         </div>
        //         <div>
        //             <Task name={mytask.name} description={mytask.description} currentTask={this.state.currentTask} tasks={this.state.tasks} currentTaskStatus={this.state.currentTaskStatus}/>
        //         </div>
        //         <div>
        //             <AddTask onAdd={this.handleAddTask}/>
        //         </div>
        //         {/* <TaskList fetchPosts={this.fetchPosts.bind(this)} posts={this.state.posts}/> */}
        //     </div>
        // )

        return (
            <div className={'container'}>
                <h2 className={'m-4 text-center'}>My Tasks</h2>
                <div>
                    { this.renderTasks() }
                </div>
                {/*<AddTask onAdd={this.handleAddTask}/>*/}
            </div>

        );
    }
}

ReactDOM.render(<StatusButton />, document.getElementById('app'));
