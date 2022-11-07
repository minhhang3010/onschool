import axios from "axios";
import React, { useState } from "react";
import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";
import { AiTwotoneEdit } from "react-icons/ai";

const url = "http://127.0.0.1:8000/api/users";

function EditForm(props) {
  const data = props.data;
  const [show, setShow] = useState(false);

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);

  const [username, setUsername] = useState(data.username);
  const [firstname, setFirstname] = useState(data.firstname);
  const [lastname, setLastname] = useState(data.lastname);
  const [email, setEmail] = useState(data.email);
  const [gender, setGender] = useState(data.gender);
  const [phoneNumber, setPhoneNumber] = useState(data.phone_number);
  const [active, setActive] = useState(data.active);

  const userEdit = {
    username: username,
    firstname: firstname,
    lastname: lastname,
    email: email,
    gender: gender,
    phoneNumber: phoneNumber,
    active: active,
  };
  const editUser = async(id) => {
    await axios
      .put(url + `/${id}`, userEdit)
      .then(() => alert("successfully updated"))
      .catch((r)=>console.log(r))
  };

  return (
    <>
      <Button variant="primary" onClick={handleShow}>
        <AiTwotoneEdit />
      </Button>

      <Modal show={show} onHide={handleClose}>
        <Modal.Header closeButton>
          <Modal.Title>Edit User Information</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          {/* {data.map((dt)=>{ */}

          <form>
            <input
              type="text"
              placeholder="username"
              // defaultValue={data.username}
              value={username}
              onChange={(e) => setUsername(e.target.value)}
            ></input>
            <input
              type="text"
              value={firstname}
              onChange={(e) => setFirstname(e.target.value)}
            ></input>
            <input
              type="text"
              value={lastname}
              onChange={(e) => setLastname(e.target.value)}
            ></input>
            <input
              type="text"
              value={phoneNumber}
              onChange={(e) => setPhoneNumber(e.target.value)}
            ></input>
            <input
              type="text"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
            ></input>
            <input
              type="text"
              value={gender}
              onChange={(e) => setGender(e.target.value)}
            ></input>
            <input
              type="text"
              value={active}
              onChange={(e) => setActive(e.target.value)}
            ></input>
          </form>
        </Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={handleClose}>
            Close
          </Button>
          <Button
            variant="primary"
            onClick={() => {
              editUser(data.id);
              setShow(false);
            }}
          >
            Save Changes
          </Button>
        </Modal.Footer>
      </Modal>
    </>
  );
}

export default EditForm;
