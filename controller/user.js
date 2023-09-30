const fs = require('fs')
const path = require('path')

const data = JSON.parse(fs.readFileSync(path.resolve(__dirname,'../data.json'),'utf-8'));
const users = data.users;

exports.createUser = (req,res)=>{
    console.log('Post Data')
    console.log(req.body)
    users.push(req.body)
    res.json(req.body)
}

exports.getAllUsers = (req,res)=>{
    console.log('data')
    res.json(users)
}


exports.getUser =(req,res)=>{
    console.log('Single Data')
    console.log(req.params)
    const id = +req.params.id
    const user = users.find(p=>p.id === id)
    res.json(user)
} 


exports.replaceUser = (req,res)=>{
    console.log('Put Data')
    const id = +req.params.id;
    const userIndex = users.findIndex(p=>p.id===id)
    const user  = users[userIndex]
    users.splice(userIndex,1,{...req.body,id:id})
    res.status(201).json()
 }

exports. updateUser = (req,res)=>{
    console.log('Put Data')
    const id = +req.params.id;
    const userIndex = users.findIndex(p=>p.id===id)
    const user  = users[userIndex]
    users.splice(userIndex,1,{...user,...req.body})
    res.status(201).json()
 }

exports.deleteUser = (req,res)=>{
    console.log('Put Data')
    const id = +req.params.id;
    const userIndex = users.findIndex(p=>p.id===id)
    const user  = users[userIndex]
    users.splice(userIndex,1)
    res.status(201).json(user)
 }