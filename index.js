const express = require('express')
const morgan = require('morgan')
const cors = require('cors');
require("dotenv").config()
const path = require('path')
const app = express()
const productRouter = require('./routes/productRoute')
const UserRouter = require('./routes/userRoute')


// console.log(process.env.DB_PASSWORD)

// app.use((req,res,next)=>{
//     console.log(req.ip,req.method,req.hostname)
//     next()
// })
// const auth = (req,res,next) =>{
//     // if(req.body.password == 123){
//     //     next()
//     // }
//     // else{
//     //     res.sendStatus(401)
//     // }

//     next()
// }
// // app.use(auth)
// getting-started.js
const mongoose = require('mongoose');
const { Schema } = mongoose;

main().catch(err => console.log(err));  

async function main() {
  await mongoose.connect(process.env.MONGO_URL);
    console.log("Databasse Connected")
  // use `await mongoose.connect('mongodb://user:password@127.0.0.1:27017/test');` if your database has auth enabled
}



// body parser











app.get('/product/:id', (req, res) => {
    console.log(req.params)
    res.json({ type: 'GET' })
})


app.put('/', (req, res) => {
    res.json({ type: 'PUT' })
})


app.post('/', (req, res) => {
    res.json({ type: 'POST' })
})

app.patch('/', (req, res) => {
    res.json({ type: 'PATCH' })
})


app.delete('/', (req, res) => {
    res.json({ type: 'DELETE' })
})


app.get('/demo', (req, res) => {
    // res.json(data)
    // res.sendStatus(400)
    res.status(200).send("<h1>Muhammad Hunain</h1>")
    // res.sendFile("Users\HP\Desktop\Nodejs\index.html")
})


const whiteList = app.listen(process.env.PORT, () => {
    console.log("Server Started")
})


 



app.use(cors());
app.use(express.json())
// app.use(express.urlencoded())
app.use(morgan('default'))
app.use(express.static(path.resolve(process.env.PUBLIC_DIR)))
app.use('/products', productRouter.router)
app.use('/users', UserRouter.router)
app.use('*',(req,res)=>{
    res.sendFile(path.resolve(__dirname,'build','index.html'))
})
