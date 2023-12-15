import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import {
  getDatabase,
  ref,
  onValue,
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
const usersRef = ref(database, "users");

function populateTable(snapshot) {
  const userTable = document
    .getElementById("userTable")
    .getElementsByTagName("tbody")[0];
  userTable.innerHTML = "";

  snapshot.forEach((childSnapshot) => {
    const user = childSnapshot.val();
    const row = userTable.insertRow(-1);

    const fullNameCell = row.insertCell(0);
    const companyNameCell = row.insertCell(1);
    const emailCell = row.insertCell(2);
    const phoneNumberCell = row.insertCell(3);
    const studentTypCell = row.insertCell(4);

    fullNameCell.innerText = user.fullName || "";
    companyNameCell.innerText = user.companyName || "";
    emailCell.innerText = user.email || "";
    phoneNumberCell.innerText = user.phoneNumber || "";
    studentTypCell.innerText = user.studentType || "";
  });
}

onValue(usersRef, (snapshot) => {
  console.log("Snapshot:", snapshot.val());
  populateTable(snapshot);
});
