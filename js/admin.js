function getData(user) {
  myuser = user
  getAmount()
}

function addCategory(category) {
  alert(category)
  if (category == 'add') {
    document.getElementById('add_category').classList.toggle('active')
  }
}
const getAmount = () => {
  $.ajax({
    method: 'POST',
    url: '../auth/server.php',
    data: { name: 'getAmount' },
    success: function (response) {
      const data = response.split('~')
      document.getElementById('totalIncome').innerHTML = data[0]
      document.getElementById('completed_o').innerHTML = data[1]
      document.getElementById('pending_o').innerHTML = data[2]
    },
    error: function (xhr, status, error) {
      console.error(xhr)
    },
  })
}

// File type validation
$('#product_img').change(function () {
  var file = this.files[0]
  var fileType = file.type
  var match = ['image/jpeg', 'image/png', 'image/jpg']
  if (
    !(
      fileType == match[0] ||
      fileType == match[1] ||
      fileType == match[2] ||
      fileType == match[3] ||
      fileType == match[4] ||
      fileType == match[5]
    )
  ) {
    alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.')
    $('#file').val('')
    return false
  }
})

const completeOrder = (o_id) => {
  // alert(o_id+" completed")
  // complete order
  $.ajax({
    method: 'POST',
    url: '../auth/server.php',
    data: { name: 'completeOrder', o_id: o_id },
    success: function (response) {
      console.log(response)
      if (response == 'success') {
        document.querySelector('#readBtn').classList.add('active')
        alert('Order Completed')
        location.reload()
      }
    },
    error: function (xhr, status, error) {
      console.error(xhr)
    },
  })

}