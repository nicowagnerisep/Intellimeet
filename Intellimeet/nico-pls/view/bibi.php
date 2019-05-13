<header>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</header>
<body>
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">My fun editor</h1
    </div>

    <label for="nameIn">User name</label>
    <input type="text" id="nameIn" placeholder="Enter person name"/>
    <br>

    <label for="priceIn">Price Paid</label>
    <input type="number" id="priceIn" placeholder="price paid in €"/>
    <br>

    <button type="button" class="btn btn-primary" id="addUser" onclick="addUser()">Add User</button>
    <br>
    <label for="weight">Cookie weight in grams</label>
    <input type="number" id="weight" placeholder="number of Gs"/>
    <br>
    <button type="button" class="btn btn-success" onclick="calculate()">Calculate</button>
    <h3>
    </h3>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price Paid</th>
            <th scope="col">Cookie weight</th>
        </tr>
        </thead>
        <tbody id="result">

        </tbody>
    </table>

    <script>
        const user = document.getElementById('nameIn');
        const price = document.getElementById('priceIn');
        const weight = document.getElementById('weight');
        const resultDiv = document.getElementById('result');

        let form;

        const result = 0;

        const users = [];

        const addUser = () => {
            users.push({
                name: user.value,
                price: price.value,
                weight: null
            });
            console.log(users);
        };

        const calculate = () => {
            console.log(weight.value);
            let totalWeight = weight.value;
            let totalUsers = [];
            let res = weight.value;

            let totalPaid = 0;

            users.map(user => {
                totalPaid += parseInt(user.price);
            });

            users.map(user => {
                totalUsers.push({
                    name: user.name,
                    price: user.price,
                    weight: (totalWeight / parseInt(totalPaid)) * user.price
                })
            });

            console.log(totalUsers);

            totalUsers.map(user => {
                resultDiv.insertAdjacentHTML('beforeend','<tr><td scope="row">'+
                    user.name+'</td><td>'+user.price+'€</td><td>'+user.weight+'g</td></tr>');

            });

        };


    </script>

</div>
</body>