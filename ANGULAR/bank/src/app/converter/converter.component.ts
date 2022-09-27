import { Component, OnInit } from '@angular/core';
import { CurrencyapidataService } from '../currencyapidata.service';

@Component({
  selector: 'app-converter',
  templateUrl: './converter.component.html',
  styleUrls: ['./converter.component.css']
})
export class ConverterComponent implements OnInit {
  currjson:any=[];

  inputV='1';
  base='USD';
  cont2='USD';
  
  result:string='1';

  chagebase(a:string){
    this.base=a;

  }
  tocountry(b:string){
    this.cont2=b;
  }
  inputVal(c:string){
    this.inputV=c;
    
  }
  x:number=+this.inputV;
  r:number=+this.result;
  constructor(private currency:CurrencyapidataService) {}
    convert(){
this.currency.getcurrencydata(this.base).subscribe(data=>{
  this.currjson=JSON.stringify(data);
  this.currjson=JSON.parse(this.currjson);


if(this.cont2=='USD'){
  this.r=this.currjson.rates.USD*this.x;
}

if(this.cont2=='EUR'){
  this.r=(this.currjson.rates.EUR)*this.x;
}

if(this.cont2=='MDL'){
  this.r=(this.currjson.rates.MDL)*this.x;
}

})
    }
  

  ngOnInit(): void {
  }

}
