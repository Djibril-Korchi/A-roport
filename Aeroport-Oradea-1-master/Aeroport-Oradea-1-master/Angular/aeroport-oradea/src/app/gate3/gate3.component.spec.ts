import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { Gate3Component } from './gate3.component';

describe('Gate3Component', () => {
  let component: Gate3Component;
  let fixture: ComponentFixture<Gate3Component>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Gate3Component ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(Gate3Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
