const fs = require('fs')
const model = require('../Models/Products')
const Product = model.Product;
// const data = JSON.parse(fs.readFileSync('data.json','utf-8'))
// const products = data.products;

exports.createProduct = (req,res)=>{
 const product = new Product(req.body)       
   const data = product.save();      
     if(data){
           crossOriginIsolated.log(res.status(400));
           console.log('done')
     }
            else{
            console.log(res.status(201))
           console.log('Not done')

        }
    
    res.status(200).json(req.body)
}

exports.getAllProducts = async (req,res)=>{
   const products = await Product.find();
   res.json(products)
}


exports.getProduct = async(req,res)=>{
    // console.log('Single Data')
    // console.log(req.params)
    const id =  req.params.id
    // const product = products.find(p=>p.id === id)
    const product = await Product.findById(id)
    res.json(product)


} 


exports.replaceProduct = async (req,res)=>{
    // console.log('Put Data')
    // const id = +req.params.id;
    // const productIndex = products.findIndex(p=>p.id===id)
    // const product  = products[productIndex]
    // products.splice(productIndex,1,{...req.body,id:id})
    // res.status(201).json()

    const id  = req.params.id;
    try{
        console.log(req.params)
        const doc = await Product.findOneAndReplace({_id:id},req.body,{new:true})
        res.status(201).json(doc)
    }
    catch(err){
        console.log(err)
        res.status(400).json(err);
    }
    
}

exports.updateProduct = async (req,res)=>{
//     console.log('Put Data')
//     const id = +req.params.id;
//     const productIndex = products.findIndex(p=>p.id===id)
//     const product  = products[productIndex]
//     products.splice(productIndex,1,{...product,...req.body})
//     res.status(201).json()
//  

const id  = req.params.id;
try{
    const doc = await Product.findOneAndUpdate({_id:id},req.body,{new:true})
    res.status(201).json(doc)
}
catch(err){
    console.log(err)
    res.status(400).json(err);
}
}

exports.deleteProduct = async (req,res)=>{
    // console.log('Put Data')
    // const id = +req.params.id;
    // const productIndex = products.findIndex(p=>p.id===id)
    // const product  = products[productIndex]
    // products.splice(productIndex,1)
    // res.status(201).json(product)
    const id  = req.params.delete;
    try{
        console.log(id)
        const doc = await Product.findOneAndDelete({_id:id})                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        res.status(201).json(doc)
    }
    catch(err){
        console.log(err)
        res.status(400).json(err);
    }
 }