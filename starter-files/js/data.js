import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import {
  getDatabase,
  ref,
  push,
  set,
} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-database.js";

const firebaseConfig = {
  apiKey: "AIzaSyALaF_GMnll1eVLyBDsMum-88iNWbz3DeM",
  authDomain: "brainster-labs-ef731.firebaseapp.com",
  projectId: "brainster-labs-ef731",
  storageBucket: "brainster-labs-ef731.appspot.com",
  messagingSenderId: "765476472631",
  appId: "1:765476472631:web:abf17963485cac7b58fcb2",
};

const app = initializeApp(firebaseConfig);
const database = getDatabase(app);
const form = document.getElementById("form");
const alert = document.getElementById("alert");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const fullName = document.getElementById("full-name").value;
  const companyName = document.getElementById("company-name").value;
  const email = document.getElementById("email").value;
  const tel = document.getElementById("tel").value;
  const student = document.getElementById("student");
  const studentTyp = student.textContent;

  const newClientRef = push(ref(database, "users"));
  console.log("student:", studentTyp);

  set(newClientRef, {
    fullName: fullName,
    companyName: companyName,
    email: email,
    phoneNumber: tel,
    studentType: studentTyp,
  });
  alert.style.display = "block";
  setTimeout(() => {
    alert.style.display = "none";
  }, 3500);

  form.reset();
});
