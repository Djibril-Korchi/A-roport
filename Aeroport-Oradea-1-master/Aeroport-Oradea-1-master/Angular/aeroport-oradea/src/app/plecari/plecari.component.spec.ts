import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PlecariComponent } from './plecari.component';

describe('PlecariComponent', () => {
  let component: PlecariComponent;
  let fixture: ComponentFixture<PlecariComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PlecariComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PlecariComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
