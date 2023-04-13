function checkSimilarity() {
  var email = document.getElementById("email").value;
  var email2 = document.getElementById("email2").value;

  if (email == email2) {
    alert("The emails are the same");
  } else {
    alert("The emails are not the same");
  }
}

function validate() {
  const form = document.getElementById("test");
  const elements = form.elements;
  let missinginfo = [];
  let valid = true;


  for (let i = 0; i < elements.length; i++) {
    const element = elements[i];

    if (element.type === "text" || element.type == "textarea" || element.type == "password" || element.type == "email") {
      if (element.value.trim() == "") {
        missinginfo.push(element.name);
        valid = false;
      }
    } else if (element.type == "radio" || element.type == "checkbox") {
      const radioGroup = document.getElementsByName(element.name);

      if (radioGroup.length > 0) {
        let isChecked = false;

        for (let j = 0; j < radioGroup.length; j++) {
          if (radioGroup[j].checked) {
            isChecked = true;
            break;
          }
        }

        if (!isChecked) {
          if (element.name == "gender") {
            if (!missinginfo.includes(element.name)) {
              missinginfo.push(element.name);
            }
          } else {
            missinginfo.push(element.name);
          }
          valid = false;
        }
      }
    }
  }

  if (!valid) {
    const missinginfostuff = missinginfo.join(", ");
    alert(`Please fill out one or more following fields: ${missinginfostuff}`);
  }
}


