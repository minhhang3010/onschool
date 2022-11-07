import React from "react";
import Table from "react-bootstrap/Table";
import "bootstrap/dist/css/bootstrap.css";
import {AiTwotoneEdit} from 'react-icons/ai';
import {AiOutlineDelete} from 'react-icons/ai';
import {Link} from 'react-router-dom';
import EditForm from "./modal";

function UserTable(props) {
  const data = props.data;
  const remove = props.removeUser;
  return (
    <Table striped bordered hover>
      <thead>
        <tr>
          <th>#</th>
          <th>User Name</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Active</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        {data.map((dt) => {
          return (
            <tr key={dt.id}>
              <td>{dt.id}</td>
              <td>{dt.username}</td>
              <td>{dt.firstname}</td>
              <td>{dt.lastname}</td>
              <td>{dt.phone_number}</td>
              <td>{dt.email}</td>
              <td>{dt.gender}</td>
              <td>{dt.active}</td>
              <td>
                <EditForm data={dt}></EditForm>
                <button onClick={()=>remove(dt.id)}>
                    <AiOutlineDelete/>
                </button>  
                
              </td>
            </tr>
          );
        })}
      </tbody>
    </Table>
  );
}

export default UserTable;
