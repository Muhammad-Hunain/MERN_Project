const userController  = require('../controller/user')
const express = require('express')

const router = express.Router()

router
.post('/',userController.createUser)
.get('/',userController.getAllUsers)
.get('/:id',userController.getUser)
.put('/:id',userController.replaceUser)
.patch('/:id',userController.updateUser)
.delete('/:delete',userController.deleteUser)

exports.router = router 