import React, { useEffect, useState } from "react";
import UserTable from "./table";
import axios from "axios";

const url = "http://127.0.0.1:8000/api/users";

function Users() {
  console.log("helloo");
  const [data, setData] = useState([]);

  // const [username, setUsername] = useState('');
  // const [firstname, setFirstname] = useState('');
  // const [lastname, setLastname] = useState('');
  // const [email, setEmail] = useState('');
  // const [gender, setGender] = useState('');
  // const [phoneNumber, setPhoneNumber] = useState('');
  // const [active, setActive] = useState('');

  // const listValue ={username, firstname, lastname, email, gender, phoneNumber, active}

  const removeUser = (id) => {
    const newUsers = data.filter((user)=>user.id !== id);
    axios.delete(url + `/${id}`).then(()=> alert("successfully remove"));
    setData(newUsers);
  }

  const fetchData = async () => {
    try {
      const response = await axios(url);
      // console.log(response.data)
      setData(response.data);
    } catch (error) {}
  };

  useEffect(() => {
    fetchData();
  }, []);

 

  return <UserTable data={data} removeUser={removeUser} />;
}

export default Users;
