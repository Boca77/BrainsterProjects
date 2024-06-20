const userId = document.getElementById("user-id").innerHTML;
const bookId = document.getElementById("book-id").innerHTML;
const notesInput = document.getElementById("note");
const noteButton = document.getElementById("add-note");
const noteDisplay = document.getElementById("display-note");
const noteMsg = document.getElementById("noteMsg");

notesInput.value = "Add a note";

notesInput.addEventListener("focus", () => {
  if (notesInput.value === "Add a note") {
    notesInput.value = "";
  }
});

notesInput.addEventListener("focusout", () => {
  if (notesInput.value === "") {
    notesInput.value = "Add a note";
  }
});

function fetchNotes() {
  fetch("http://localhost/project/backEnd/api/fetch.php")
    .then((response) => response.json())
    .then((data) => {
      noteDisplay.innerHTML = "";
      data.forEach((item) => {
        if (item.user_id == userId && item.book_id == bookId) {
          const noteContainer = document.createElement("div");
          noteContainer.classList.add("note-container");
          noteContainer.dataset.noteId = item.id;

          const noteText = document.createElement("div");
          noteText.textContent = `Note: ${item.text}`;
          noteContainer.appendChild(noteText);

          const editButton = document.createElement("button");
          editButton.classList.add("mr-3", "bg-yellow-600", "rounded", "px-2");
          editButton.textContent = "Edit";
          editButton.addEventListener("click", () => {
            notesInput.value = item.text;

            notesInput.dataset.noteId = item.id;
          });
          noteContainer.appendChild(editButton);

          const deleteButton = document.createElement("button");
          deleteButton.classList.add("bg-red-600", "rounded", "px-2");
          deleteButton.textContent = "Delete";
          deleteButton.addEventListener("click", () => {
            fetch(
              `http://localhost/project/backEnd/api/delete.php?id=${item.id}`,
              {
                method: "DELETE",
              }
            )
              .then((response) => response.json())
              .then((data) => {
                noteMsg.innerHTML = data.message;
                fetchNotes();
              })
              .catch((error) => {
                console.error("Error deleting note:", error);
              });
          });
          noteContainer.appendChild(deleteButton);

          noteDisplay.appendChild(noteContainer);
        }
      });
    })
    .catch((error) => {
      console.error("Error fetching notes:", error);
    });
}

fetchNotes();

noteButton.addEventListener("click", () => {
  const notesValue = notesInput.value.trim();

  if (!notesValue || notesValue == "Add a note") {
    noteMsg.innerHTML = "Please enter a note.";
    return;
  }

  const requestBody = {
    message: notesValue,
    user_id: userId,
    book_id: bookId,
  };

  let url = "http://localhost/project/backEnd/api/upload.php";
  let method = "POST";

  if (notesInput.dataset.noteId) {
    const noteId = notesInput.dataset.noteId;
    url = `http://localhost/project/backEnd/api/edit.php?id=${noteId}`;
    method = "PUT";
  }

  fetch(url, {
    method: method,
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(requestBody),
  })
    .then((response) => response.json())
    .then((data) => {
      noteMsg.innerHTML = data.message;
      notesInput.value = "";
      delete notesInput.dataset.noteId;
      fetchNotes();
    })
    .catch((error) => {
      console.error("Error adding/editing note:", error);
    });
});
