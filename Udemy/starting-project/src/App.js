import React, {useState} from 'react';
import NewGoal from './components/NewGoal/NewGoal';
import GoalList from './components/GoalList/GoalList';

import './App.css';


const App = () => {

  //use state always is always an array with 2 paramater, the data and a function to update it
  //courseGoals is the variable containing the json objects, that is sent to the child
  const [courseGoals, setCourseGoals] = useState(
    [ {id:'cg1', text: 'Finish the Course'},
      {id:'cg2', text: 'Learn All about the Course Main Topic'},
      {id:'cg3', text: 'Help other students in the course'}, ]
  );

  //create function to get child data
  const addNewGoalHandler = (newGoal) =>{

    //we create a function inside the course goal function updater so has to handle delaying
    //and multiple transformation on the original data
    setCourseGoals((prevCourseGoals) => {
      return prevCourseGoals.concat(newGoal)
    })

  };

  return (
  <div  className="course-goals">
    <h2>Course Goals</h2>
    <NewGoal onAddGoal={addNewGoalHandler} />
    <GoalList goals={courseGoals} />
  </div>
  );

};

export default App;
