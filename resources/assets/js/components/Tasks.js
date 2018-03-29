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
        };

        this.handleAddTask = this.handleAddTask.bind(this);
    }


    /*componentDidMount() is a lifecycle method
     * that gets called after the component is rendered
     */
    componentDidMount() {
        /* fetch API in action */
       this.fetchTask();
    }

    fetchTask() {
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
                <div task_key={task.id} key={task.id} className={'ml-2 d-flex justify-content-between'}>
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

    handleAddTask(task) {

        /*Fetch API for post request */
        console.log('fetch follows...');
        fetch( '/api/api/tasks', {
            method:'post',
            /* headers are important*/
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },

            body: JSON.stringify(task)
            // data: {name: 'test',
            //     description: 'test',
            //     user_id: 0,
            //     category_id: 0,
            //     apartment_id: 1,
            //     status_id: 0,
            //     raisedBy_id: 0,}
        })
            .then(response => {
                return response.json();
            })
            .then( data => {
                //update the state of products and currentProduct
                this.setState((prevState)=> ({
                    tasks: prevState.tasks.concat(data),
                    currentTask : data
                }))
            })

    }

    render() {
        return (
            <div className={'container'}>
                <h2 className={'m-4 text-center'}>My Tasks</h2>

                <div>
                    { this.renderTasks() }
                </div>

                <AddTask onAdd={this.handleAddTask}/>


            </div>

        );
    }
}

class Button extends Component{

    constructor(props) {
        super(props);

        this.state = {
            key: 0,
            task_key: props.task_key,
            value: 0
        }
    }

    // when click:


    render() {

    }

}

class AddTask extends Component {

    constructor(props) {
        super(props);
        /* Initialize the state. */
        this.state = {
            newTask: {
                name: 'default',
                description: 'default',
                user_id: 1,
                category_id: 0,
                apartment_id: 1,
                status_id: 0,
                raisedBy_id: 0,
            }
        }

        //Boilerplate code for binding methods with `this`
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleInput = this.handleInput.bind(this);
    }

    /* This method dynamically accepts inputs and stores it in the state */
    handleInput(key, e) {

        /*Duplicating and updating the state */
        var state = Object.assign({}, this.state.newTask);
        state[key] = e.target.value;
        this.setState({newTask: state });
    }
    /* This method is invoked when submit button is pressed */
    handleSubmit(e) {
        //preventDefault prevents page reload
        e.preventDefault();
        /*A call back to the onAdd props. The current
         *state is passed as a param
         */
        console.log('im here');
        this.props.onAdd(this.state.newTask);
    }

    render() {
        // const divStyle = {'form'}

        return(
            <div>
                <h2> Add new task </h2>
                <div>
                    {/*when Submit button is pressed, the control is passed to*/}
                    {/*handleSubmit method*/}

                    <form onSubmit={this.handleSubmit}>
                        <label> Name:
                            { /*On every keystroke, the handleInput method is invoked */ }
                            <input type="text" onChange={(e)=>this.handleInput('name',e)} />
                        </label>

                        <label> Description:
                            <input type="text" onChange={(e)=>this.handleInput('description',e)} />
                        </label>

                        <input type="submit" value="Submit" />
                    </form>
                </div>
            </div>)
    }
}


ReactDOM.render(<StatusButton />, document.getElementById('app'));
