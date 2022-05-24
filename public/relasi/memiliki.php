* {
    box-sizing: border-box;
}

body {
    margin: 0;
}

.wrapper {
    display: flex;
    height: 100vh;
}

.content {
    display: flex;
    flex-direction: column;
    flex: 1 1 auto;
}

nav {
    display: flex;
    overflow: hidden;
    background-color: #6B4D98;

}

nav a{
    flex: 1 1 0;
    padding: 20px;
    font-size: 17px;
    text-align: center;
    text-decoration: none;
    color: #fff;
}

nav a:hover{
    background-color: #7F5FAE;
}

nav a:active {
    background-color: #5C4283;
}

aside{
    display: flex;
    flex-direction: column;
    flex: 0 0 200px;
    background-color: #4D6199;
}

aside a{
    padding: 20px;
    font-size: 17px;
    text-decoration: none;
    color: #fff;
}

aside a:hover{
    background-color: #6C80B5;
}

aside a:active {
    background-color: #3C4C78;
}

main {
    flex: 1;
    background-color: #fffcf7;
}

#status {
    padding: 0px 5px;
    color: #fff;
    border-bottom: 1px solid #fff;
    margin: 0;
}

.main-content{
    display: flex;
    flex-direction: column;
    align-items: center;
}

.product-table{
    flex: 1 1 auto;
}

.logo {
    text-align: center;
    color: #CABCDD;
}


table, td, th {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 800px;
    border: 1px solid#120808;
    text-align: left;
    padding: 8px;
}

td{
    background-color: success;
}

.add-form-popup {
    display: none;
    position: absolute;
    background-color: rgba(96, 96, 96, 0.3);
    z-index: 1;
    width: 100%;
    height: 100%;
}

.edit-form-popup {
    display: none;
    position: absolute;
    background-color: rgba(96, 96, 96, 0.3);
    z-index: 1;
    width: 100%;
    height: 100%;
}

.add-form-popup .form-container {
    display: flex;
    position: absolute;
    width: 50%;
    height: 50%;
    flex-direction: column;
    text-align: left;
    background-color: #fff;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);

    padding: 20px;

   justify-content: space-evenly;
}

.edit-form-popup .form-container {
    display: flex;
    position: absolute;
    width: 50%;
    height: 50%;
    flex-direction: column;
    text-align: left;
    background-color: #fff;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);

    padding: 20px;

   justify-content: space-evenly;
}


.action-buttons {
    display: flex;
    justify-content: space-evenly;
}
