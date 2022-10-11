import React from "react";
import { useState, useEffect } from "react";
import "./App.css";
import LeftBar from "./componetes/LeftBar";
import Page from "./componetes/Page";
import axios from "axios";

function App() {
    const [page, setPage] = useState("");
    const [students, setStudents] = useState([]);

    useEffect(() => {
        fetchStudents();
    }, []);

    // const fetchStudents = async () => {
    //     const res = await fetch("http://127.0.0.1:8000/students");
    //     const data = await res.json();
    //     console.log(data);
    //     return data;
    // };
    const fetchStudents = () => {
        axios
            .get("http://127.0.0.1:8000/students")
        .then((res) => {
            console.log(res);
        })
        .catch((err) => {
            console.log(err);
        });
    }
    return (
        <div className="app-div">
            <LeftBar userType={"instructor"} setPage={setPage} />
            <div className="page-container">
                <h1>{page}</h1>
                <div>
                    <Page pageTitle={page} />
                </div>
            </div>
        </div>
    );
}

export default App;
