//Aadhar validation

// multiplication table
const d = [
  [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
  [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
  [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
  [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
  [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
  [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
  [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
  [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
  [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
  [9, 8, 7, 6, 5, 4, 3, 2, 1, 0],
];

// permutation table
const p = [
  [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
  [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
  [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
  [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
  [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
  [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
  [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
  [7, 0, 4, 6, 9, 1, 3, 2, 5, 8],
];

// validates Aadhar number received as string
function validate(aadharNumber) {
  let c = 0;
  let invertedArray = aadharNumber.split("").map(Number).reverse();

  invertedArray.forEach((val, i) => {
    c = d[c][p[i % 8][val]];
  });

  return c === 0;
}

function aadhar_verify() {
  console.log("Inside addhar verify");
  var aadharNo = document.getElementById("aadhar_no").value;
  console.log(aadharNo);
  if (validate(aadharNo)) {
    document.getElementById("aadhar_valid_no").value = aadharNo;
  }
}

//Last class

function find_last_class() {
  var lastClass = new Map([
    ["1st", "Primary"],
    ["2nd", "1st"],
    ["3rd", "2nd"],
    ["4th", "3rd"],
    ["5th", "4th"],
    ["6th", "5th"],
    ["7th", "6th"],
    ["8th", "7th"],
    ["9th", "8th"],
    ["10th", "9th"],
    ["11th", "10th"],
    ["12th", "11th"],
  ]);
  console.log("insidefunc");
  var admission_class = document.getElementById("admission_class").value;
  var lastClassValue = lastClass.get(admission_class);

  document.getElementById("last_class").value = lastClassValue;
}

/////

function percentCal(parentId) {
  let maxMarks = $(`#${parentId} .input-max-mark`).val();

  let obtMarks = $(`#${parentId} .input-obt-mark`).val();
  if (maxMarks != "" && obtMarks != "") {
    let markPercent = ((obtMarks / maxMarks) * 100).toFixed(2);

    $(`#${parentId} .input-mark-percent`).val(markPercent + " %");
  }
}
$(document).ready(function () {
  console.log("Document ready");

  $(function () {
    $("#dob").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1990:2020",
      dateFormat: "yy-mm-dd",
    });
  });

  $(function () {
    $("#issued_date").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1990:2020",
      dateFormat: "yy-mm-dd",
    });
  });

  $("#last_school_affiliated").change(function () {
    console.log("sle");
    if ($(this).children("option:selected").val() == "Other") {
      console.log("get");
      $("#board-select .value").append(`
          <div class='input-group-desc' id="boardDiv">
          <br>
          <label class='label label--block'>Enter Board</label>
            <input class="input--style-5 input-subject" type="text" name="other_board" placeholder="Enter the board name" 
             required  />
          </div>
        `);
    } else {
      $("#boardDiv").remove();
    }
  });

  $('input[type=radio][name="last_school_attended"]').change(function () {
    if ($(this).val() == "other") {
      $("#lastSchool").append(`
     
      <div id="lastSchoolInfo">
              <div class="form-row">
                <div class="name">Name of Last School Attended<span style="color:red">*</span></div>
                <div class="value">
                  <div class="input-group">
                    <input
                      class="input--style-5"
                      type="text"
                      name="last_school_name"
                      required
                     
                    />
                  </div>
                </div>
              </div>

             

              <div class="form-row">
                <div class="name">Address of Last School Attended<span style="color:red">*</span></div>
                <div class="value">
                  <div class="input-group">
                    <input
                      class="input--style-5"
                      type="text"
                      name="last_school_address"
                      required
                     
                    />
                  </div>
                </div>
              </div>
        </div>
      `);
    } else {
      $("#lastSchoolInfo").remove();
    }
  });

  $("#category").change(function () {
    console.log("category");
    let category = $(this).children("option:selected").val();
    if (category == "general") {
      console.log("Hide");
      $("#form-row #categoryFile").removeAttr("required");
      console.log("after removing required");
      $("#form-row #optionalELe").hide();
    } else {
      console.log("show");
      $("#form-row #categoryFile").attr("required", "required");
      console.log("after adding required");
      $("#form-row #optionalELe").show();
    }
  });
});
