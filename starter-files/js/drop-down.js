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

const selectButton = document.querySelector(".select-button");
const selectDropdown = document.querySelector(".select-dropdown");

const optionsRef = ref(database, "students");

function populateSelect(snapshot) {
  if (snapshot.exists()) {
    selectDropdown.innerHTML = "";

    snapshot.forEach((childSnapshot) => {
      const option = childSnapshot.val();
      const optionElement = document.createElement("li");
      optionElement.classList.add("de-active");

      optionElement.textContent = option.name || "";
      optionElement.setAttribute("role", "option");

      optionElement.addEventListener("click", () => {
        selectButton.querySelector(".selected-value").textContent =
          option.name || "";
      });

      selectDropdown.appendChild(optionElement);
    });
  } else {
    console.log("No data available in the snapshot.");
  }
}

onValue(optionsRef, (snapshot) => {
  try {
    console.log("Snapshot:", snapshot.val());
    populateSelect(snapshot);
  } catch (error) {
    console.error("Error populating select box:", error);
  }
});
