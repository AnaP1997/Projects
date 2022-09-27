import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class CurrencyapidataService {

  constructor(private http:HttpClient) { }
  getcurrencydata(country1:string){
    let url='https://v6.exchangerate-api.com/v6/3c754ce73ffa4002b80bb91f/latest/'+country1
    return this.http.get(url);
  }
}
