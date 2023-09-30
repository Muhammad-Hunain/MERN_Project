const mongoose = require('mongoose');
const { Schema } = mongoose;

const addressSchema = new Schema({
    location: String,
    district: String,
    city: String,
  });

const products = new Schema({
    title:{type:String,required:true,unique:true},
    description:String,
    price: {type:Number,required:true,min:[500,"Maximum from 500"],max:100000},
    discountPercentage:Number,
    rating: {type:Number,min:[0,"wrong Minimum rating"],max:[5,"Wrong max rating"]},
    brand: {type:String,required:true},
    category: {type:String,required:true},
    thumbnail: {type:String,required:true},
    images: [String],
    address:addressSchema
});

 exports.Product = mongoose.model('Product', products);