import logo from './logo.svg';
import './App.css';
import Users from './pages/users';
// import EditForm from './pages/modal';
import {BrowserRouter, Routes, Route} from 'react-router-dom';
import PopUp from './pages/popup';


function App() {

  return (
    // <Users/>
    <BrowserRouter>
      <Routes>
        <Route path='/user' element={<Users/>}/>
        {/* <Route path='/edit' element={<EditForm/>}/> */}
      </Routes>
    </BrowserRouter>
  );
}

export default App;
