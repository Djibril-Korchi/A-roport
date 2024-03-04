import { Component, OnInit, Output, EventEmitter } from '@angular/core';


@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  @Output() onSelected = new EventEmitter<string>();
  constructor() { }

  ngOnInit(): void {
  }

  onSelect(page: string) {
    this.onSelected.emit(page);
  }
}
