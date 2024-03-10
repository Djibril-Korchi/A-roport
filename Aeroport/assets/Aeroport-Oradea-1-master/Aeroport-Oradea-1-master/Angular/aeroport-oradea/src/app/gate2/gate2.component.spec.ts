import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { Gate2Component } from './gate2.component';

describe('Gate2Component', () => {
  let component: Gate2Component;
  let fixture: ComponentFixture<Gate2Component>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Gate2Component ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(Gate2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
