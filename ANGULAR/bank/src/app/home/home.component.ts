import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  text:string='„Cea mai inovativă bancă din Moldova”'
  constructor() { }

  ngOnInit(): void {
  }

}
