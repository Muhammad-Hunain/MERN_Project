const productController  = require('../controller/product')
const express = require('express')

const router = express.Router()

router
.post('/',productController.createProduct)
.get('/',productController.getAllProducts)
.get('/:id',productController.getProduct)
.put('/:id',productController.replaceProduct)
.patch('/:id',productController.updateProduct)
.delete('/:delete',productController.deleteProduct)

exports.router = router;