import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class AddTask extends Component {

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