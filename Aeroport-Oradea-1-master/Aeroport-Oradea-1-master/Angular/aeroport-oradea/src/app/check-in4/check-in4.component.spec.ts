import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CheckIn4Component } from './check-in4.component';

describe('CheckIn4Component', () => {
  let component: CheckIn4Component;
  let fixture: ComponentFixture<CheckIn4Component>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CheckIn4Component ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CheckIn4Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
