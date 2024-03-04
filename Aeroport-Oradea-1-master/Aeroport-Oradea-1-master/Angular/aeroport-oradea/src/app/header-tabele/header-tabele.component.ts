import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-header-tabele',
  templateUrl: './header-tabele.component.html',
  styleUrls: ['./header-tabele.component.css']
})
export class HeaderTabeleComponent implements OnInit {
  currentDate = new Date();

  @Input() name: string;

  constructor() {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
   }
  ngOnInit(): void {
  }

}
