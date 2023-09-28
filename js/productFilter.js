let myuser
function getData(user) {
  myuser = user
  getCartCount()
  console.log(myuser)
}


function addToCart(id) {
  console.log(myuser)
  $.ajax({
    method: 'POST',
    url: '../auth/addToCart.php',
    data: { name: 'AddToCart', product: id, myuser },
    success: function (response) {
      console.log(response)
      if (response == 'success') {
        getCartCount()
        alert('Product Added To Cart ')
      } else {
        alert('Product Already Added IN Cart')
      }
    },
    error: function (xhr, status, error) {
      console.error(xhr)
    },
  })
}

function getCartCount() {
  $.ajax({
    method: 'POST',
    url: '../auth/addToCart.php',
    data: { name: 'getCartCount', myuser },
    success: function (response) {
      console.log(response)
      document.getElementById('CartCount').innerHTML = response
    },
    error: function (xhr, status, error) {
      console.error(xhr)
    },
  })
}
// Create Post Req for product ordering
const myOrder = document.querySelector('#myOrder')
function orderNow(ids, amount) {
  let username = document.querySelector('#username').value
  let mo_no = document.querySelector('#mo_no').value
  let email = document.querySelector('#email').value
  let city = document.querySelector('#city').value
  let zip = document.querySelector('#zip').value
  let state = document.querySelector('#state').value
  let address = document.querySelector('#address').value
  // let payment = document.getElementsByClassName('pay_method')
  let payment = document.querySelector('input[name="payment"]:checked').value
  let flag=true
  if (username == "") {
    document.getElementById('username').style.borderColor = "red";
    flag=false
  }else{
    document.getElementById('username').style.borderColor = "grey";
    flag=true
  }
  if (mo_no == '') {
    document.getElementById('mo_no').style.borderColor = "red";
  }else{
    document.getElementById('mo_no').style.borderColor = "grey";
    flag=true
  } 
  if (email == '') {
    document.getElementById('email').style.borderColor = "red";
    flag=false
  }else{
    document.getElementById('email').style.borderColor = "grey";
    flag=true
  } 
  if (city == '') {
    document.getElementById('city').style.borderColor = "red";
    flag=false
  }else{
    document.getElementById('city').style.borderColor = "grey";
    flag=true
  } 
  if (zip == '') {
    document.getElementById('zip').style.borderColor = "red";
    flag=false
  }else{
    document.getElementById('zip').style.borderColor = "grey";
    flag=true
  } 
  if (state == 'none') {
    document.getElementById('state').style.borderColor = "red";
    flag=false
  }else{
    document.getElementById('state').style.borderColor = "grey";
    flag=true
  } 
  if (address == '') {
    document.getElementById('address').style.borderColor = "red";
    flag=false
  }else{
    document.getElementById('address').style.borderColor = "grey";
    flag=true
  } 

  if(flag){
    let product_ids = ids
    const formData = {
      username,
      mo_no,
      email,
      city,
      zip,
      state,
      address,
      product_ids,
      payment,
      amount,
    }
    $.ajax({
      method: 'POST',
      url: '../auth/addToCart.php',
      data: { name: 'order_product', myuser, formData },
      success: function (response) {
        console.log(response)
        // alert(response)
        if (response == 'success') {
          document.querySelector('#order_success').classList.toggle('active')
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr)
      },
    })
  }
}

function alertBox() {
  document.querySelector('#order_success').classList.toggle('active')
  location.reload()
}
