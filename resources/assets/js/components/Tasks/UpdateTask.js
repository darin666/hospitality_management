import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class UpdateTask extends Component {

    constructor(props) {
        super(props);
        /* Initialize the state. */
        this.state = {
            currentTask: {
                name: this.props.mytask.name,
                description: this.props.mytask.description,
                user_id: 1,
                category_id: 0,
                apartment_id: 1,
                status_id: 1,
                raisedBy_id: 0,
                id: this.props.mytask.id
            }
        }

        //Boilerplate code for binding methods with `this`
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleInput = this.handleInput.bind(this);
    }

    /* This method dynamically accepts inputs and stores it in the state */
    handleInput(key, e) {

        /*Duplicating and updating the state */
        var state = Object.assign({}, this.state.currentTask);
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
        this.props.onUpdate(this.state.currentTask);
        console.log(this.props.mytask);
    }

    render() {
        // const divStyle = {'form'}

        return(
            <div>
                <h2> Edit task </h2>
                <div>
                    {/*when Submit button is pressed, the control is passed to*/}
                    {/*handleSubmit method*/}
                    <form onSubmit={this.handleSubmit}>
                        <label> New status:
                            { /*On every keystroke, the handleInput method is invoked */ }
                            <input type="number" onChange={(e)=>this.handleInput('status_id',e)} />
                        </label>

                        <input type="submit" value="Submit" />
                    </form>
                </div>
            </div>)
    }
}