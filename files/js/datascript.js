let result, act, total;
function fetchvalue() {
  var tboard = document.getElementById("tboard_in");
  var tboard = tboard.value;
  if (document.getElementById("one").checked)
    tplayer = document.getElementById("one").value;
  if (document.getElementById("two").checked)
    tplayer = document.getElementById("two").value;
  if (document.getElementById("three").checked)
    tplayer = document.getElementById("three").value;
  setSessionVariable("1" + tboard + tplayer);
}
function setdata() {
  document.getElementById("d11").value = "";
  document.getElementById("d12").value = "";
  document.getElementById("d13").value = "";
  document.getElementById("d21").value = "";
  document.getElementById("d22").value = "";
  document.getElementById("d23").value = "";
  document.getElementById("d31").value = "";
  document.getElementById("d32").value = "";
  document.getElementById("d33").value = "";
  document.getElementById("d41").value = "";
  document.getElementById("d42").value = "";
  document.getElementById("d43").value = "";
  document.getElementById("d51").value = "";
  document.getElementById("d52").value = "";
  document.getElementById("d53").value = "";
  document.getElementById("d61").value = "";
  document.getElementById("d62").value = "";
  document.getElementById("d63").value = "";
  document.getElementById("d71").value = "";
  document.getElementById("d72").value = "";
  document.getElementById("d73").value = "";
  document.getElementById("d81").value = "";
  document.getElementById("d82").value = "";
  document.getElementById("d83").value = "";
  document.getElementById("d91").value = "";
  document.getElementById("d92").value = "";
  document.getElementById("d93").value = "";
  document.getElementById("d101").value = "";
  document.getElementById("d102").value = "";
  document.getElementById("d103").value = "";

  document.getElementById("pname").innerHTML = result[0];
  document.getElementById("district").innerHTML = result[1];
  document.getElementById("sex").innerHTML = result[2];
  document.getElementById("age").innerHTML = result[3];
  document.getElementById("bow").innerHTML = result[4];
  if (result[5] != 0) {
    document.getElementById("d11").value = result[5];
  }
  if (result[6] != 0) {
    document.getElementById("d12").value = result[6];
  }
  if (result[7] != 0) {
    document.getElementById("d13").value = result[7];
  }
  if (result[8] != 0) {
    document.getElementById("d21").value = result[8];
  }
  if (result[9] != 0) {
    document.getElementById("d22").value = result[9];
  }
  if (result[10] != 0) {
    document.getElementById("d23").value = result[10];
  }
  if (result[11] != 0) {
    document.getElementById("d31").value = result[11];
  }
  if (result[12] != 0) {
    document.getElementById("d32").value = result[12];
  }
  if (result[13] != 0) {
    document.getElementById("d33").value = result[13];
  }
  if (result[14] != 0) {
    document.getElementById("d41").value = result[14];
  }
  if (result[15] != 0) {
    document.getElementById("d42").value = result[15];
  }
  if (result[16] != 0) {
    document.getElementById("d43").value = result[16];
  }
  if (result[17] != 0) {
    document.getElementById("d51").value = result[17];
  }
  if (result[18] != 0) {
    document.getElementById("d52").value = result[18];
  }
  if (result[19] != 0) {
    document.getElementById("d53").value = result[19];
  }
  if (result[20] != 0) {
    document.getElementById("d61").value = result[20];
  }
  if (result[21] != 0) {
    document.getElementById("d62").value = result[21];
  }
  if (result[22] != 0) {
    document.getElementById("d63").value = result[22];
  }
  if (result[23] != 0) {
    document.getElementById("d71").value = result[23];
  }
  if (result[24] != 0) {
    document.getElementById("d72").value = result[24];
  }
  if (result[25] != 0) {
    document.getElementById("d73").value = result[25];
  }
  if (result[26] != 0) {
    document.getElementById("d81").value = result[26];
  }
  if (result[27] != 0) {
    document.getElementById("d82").value = result[27];
  }
  if (result[28] != 0) {
    document.getElementById("d83").value = result[28];
  }
  if (result[29] != 0) {
    document.getElementById("d91").value = result[29];
  }
  if (result[30] != 0) {
    document.getElementById("d92").value = result[30];
  }
  if (result[31] != 0) {
    document.getElementById("d93").value = result[31];
  }
  if (result[32] != 0) {
    document.getElementById("d101").value = result[32];
  }
  if (result[33] != 0) {
    document.getElementById("d102").value = result[33];
  }
  if (result[34] != 0) {
    document.getElementById("d103").value = result[34];
  }
  sum();
}
function sum() {
  document.getElementById("total").innerHTML = "";
  document.getElementById("s1").innerHTML = "";
  document.getElementById("s2").innerHTML = "";
  document.getElementById("s3").innerHTML = "";
  document.getElementById("s4").innerHTML = "";
  document.getElementById("s5").innerHTML = "";
  document.getElementById("s6").innerHTML = "";
  document.getElementById("s7").innerHTML = "";
  document.getElementById("s8").innerHTML = "";
  document.getElementById("s9").innerHTML = "";
  document.getElementById("s10").innerHTML = "";

  if (numin("d11") + numin("d12") + numin("d13") != 0) {
    document.getElementById("s1").innerHTML =
      numin("d11") + numin("d12") + numin("d13");
  }
  if (numin("d21") + numin("d22") + numin("d23") != 0) {
    document.getElementById("s2").innerHTML =
      numin("d21") + numin("d22") + numin("d23");
  }
  if (numin("d31") + numin("d32") + numin("d33") != 0) {
    document.getElementById("s3").innerHTML =
      numin("d31") + numin("d32") + numin("d33");
  }
  if (numin("d41") + numin("d42") + numin("d43") != 0) {
    document.getElementById("s4").innerHTML =
      numin("d41") + numin("d42") + numin("d43");
  }
  if (numin("d51") + numin("d52") + numin("d53") != 0) {
    document.getElementById("s5").innerHTML =
      numin("d51") + numin("d52") + numin("d53");
  }
  if (numin("d61") + numin("d62") + numin("d63") != 0) {
    document.getElementById("s6").innerHTML =
      numin("d61") + numin("d62") + numin("d63");
  }
  if (numin("d71") + numin("d72") + numin("d73") != 0) {
    document.getElementById("s7").innerHTML =
      numin("d71") + numin("d72") + numin("d73");
  }
  if (numin("d81") + numin("d82") + numin("d83") != 0) {
    document.getElementById("s8").innerHTML =
      numin("d81") + numin("d82") + numin("d83");
  }
  if (numin("d91") + numin("d92") + numin("d93") != 0) {
    document.getElementById("s9").innerHTML =
      numin("d91") + numin("d92") + numin("d93");
  }
  if (numin("d101") + numin("d102") + numin("d103") != 0) {
    document.getElementById("s10").innerHTML =
      numin("d101") + numin("d102") + numin("d103");
  }

  total =
    lblin("s1") +
    lblin("s2") +
    lblin("s3") +
    lblin("s4") +
    lblin("s5") +
    lblin("s6") +
    lblin("s7") +
    lblin("s8") +
    lblin("s9") +
    lblin("s10");
  if (total != 0) {
    document.getElementById("total").innerHTML = total;
  }
}
function setvalue(pos) {
  var tplayer = 0;
  var tboard = document.getElementById("tboard_in");
  var tboard = tboard.value;
  if (document.getElementById("one").checked)
    tplayer = document.getElementById("one").value;
  if (document.getElementById("two").checked)
    tplayer = document.getElementById("two").value;
  if (document.getElementById("three").checked)
    tplayer = document.getElementById("three").value;

  if (tplayer == 0) {
    alert("Player not selected");
    document.getElementById(pos).value = "";
  }
  var re = numin(pos);
  if (re >= 0 && re <= 10) {
    setSessionVariable("2" + tboard + tplayer + "&" + pos + "&" + numin(pos));
    sum();
    setSessionVariable("3" + tboard + tplayer + "&" + total);
  } else {
    alert("Score ranges from 0 to 10");
    fetchvalue();
  }
}

function setSessionVariable(data) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      if (data[0] == 1) {
        result = JSON.parse(xhr.responseText);
        setdata();
      }
      if (data[0] == 2) {
        result = xhr.responseText;
        sum();
      }
      if (data[0] == 3) {
        result = xhr.responseText;
      }
    }
  };
  xhr.send("data=" + encodeURIComponent(data));
}

function numin(pos) {
  var val = parseInt(document.getElementById(pos).value);
  if (isNaN(val)) val = 0;
  return val;
}

function lblin(pos) {
  var val = parseInt(document.getElementById(pos).textContent);
  if (isNaN(val)) val = 0;
  return val;
}
